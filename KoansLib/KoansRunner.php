<?php

namespace KoansLib;

class KoansRunner
{
    private $koansPath;
    private $passedTests = 0;
    private $failedTests = 0;
    private $totalTests = 0;
    private $totalTestsInProject = 0;
    private $firstFailure = null;
    private $currentKoan = null;
    private $files = [];
    private $configFile = 'config_koans.txt';

    public function __construct($koansPath = 'koans')
    {
        $this->koansPath = $koansPath;
        $this->loadKoansFromConfig();
    }

    /**
     * Load koan files from configuration file
     */
    private function loadKoansFromConfig()
    {
        $configPath = __DIR__ . '/../' . $this->configFile;
        
        if (!file_exists($configPath)) {
            echo "⚠️  Warning: Configuration file '{$this->configFile}' not found. Using default koans.\n";
            $this->loadDefaultKoans();
            return;
        }

        $lines = file($configPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            // Trim whitespace
            $line = trim($line);
            
            // Skip empty lines and comments (lines starting with #)
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }
            
            $this->files[] = $line;
        }

        // Remove duplicates while preserving order
        $this->files = array_unique($this->files);
        $this->files = array_values($this->files);
    }

    /**
     * Load default koans if config file is not found
     */
    private function loadDefaultKoans()
    {
        $this->files = [
            'koans/AboutAsserts.php',
            'koans/AboutTrueAndFalse.php',
            'koans/AboutVariables.php',
            'koans/AboutControlStatements.php',
            'koans/projects/AboutIsEvenMiniProject.php',
            'koans/projects/AboutTriangleProject.php',
            'koans/AboutStrings.php',
            'koans/AboutStringManipulation.php',
            'koans/projects/AboutFizzBuzzProject.php',
            'koans/projects/AboutPalindromeEasyProject.php',
            'koans/projects/AboutPalindromeHardProject.php',
            'koans/AboutArrays.php',
            'koans/AboutArrayAssignment.php',
            'koans/AboutAssociativeArray.php',
            'koans/projects/AboutConvertToRomanEasyProject.php',
            'koans/projects/AboutConvertToRomanMediumProject.php',
            'koans/projects/AboutConvertToRomanHardProject.php',
            'koans/AboutCallbackFunctions.php',
            'koans/AboutClasses.php',
            'koans/AboutObjects.php',
            'koans/AboutNull.php',
            'koans/AboutDataTypes.php',
            'koans/AboutExceptions.php',
            'koans/AboutFunctions.php',
            'koans/AboutRegularExpressions.php',
            'koans/AboutDateTime.php'
        ];
    }

    /**
     * Run all koans
     */
    public function run()
    {
        $this->countAllTests();
        $this->printHeader();

        $koanFiles = $this->discoverKoans();

        foreach ($koanFiles as $koanFile) {
            if ($this->firstFailure !== null) {
                break; // Stop at first failure for Koans-style learning
            }
            $this->runKoan($koanFile);
        }

        $this->printSummary();
        return $this->firstFailure === null ? 0 : 1;
    }

    /**
     * Count all test methods in the project
     */
    private function countAllTests()
    {
        $files = $this->files;
        $totalTests = 0;

        foreach ($files as $file) {
            $content = file_get_contents($file);
            preg_match_all('/public\s+function\s+(test\w+)\s*\(/', $content, $matches);
            $totalTests += count($matches[1]);
        }

        $this->totalTestsInProject = $totalTests;
    }

    /**
     * Discover all koan files
     */
    private function discoverKoans()
    {
        $files = $this->files;
        return $files;
    }

    /**
     * Run a single koan file
     */
    private function runKoan($koanFile)
    {
        // Require the file to ensure the class is loaded (handles subdirectories)
        if (file_exists($koanFile)) {
            require_once $koanFile;
        } else {
            echo "⚠️  Warning: File $koanFile not found\n";
            return;
        }
        
        $className = $this->getClassNameFromFile($koanFile);
        
        if (!class_exists($className)) {
            echo "⚠️  Warning: Class $className not found in $koanFile\n";
            return;
        }

        // Store the full relative path for better tracking
        $this->currentKoan = $koanFile;
        $koan = new $className();

        if (!($koan instanceof KoansTestCase)) {
            echo "⚠️  Warning: $className does not extend KoansTestCase\n";
            return;
        }

        // Print the file name before running tests
        echo "\n" . $this->colorize("File: " . basename($koanFile), 'cyan') . "\n";

        $methods = $koan->getTestMethods();

        foreach ($methods as $method) {
            if ($this->firstFailure !== null) {
                break; // Stop at first failure
            }
            $this->runTest($koan, $method);
        }
    }

    /**
     * Run a single test method
     */
    private function runTest($koan, $methodName)
    {
        $this->totalTests++;
        $testDox = $koan->getTestDox($methodName);

        // Reset exception expectations before each test
        $koan->expectedException = null;
        $koan->expectedExceptionMessage = null;

        try {
            $koan->$methodName();
            
            // Check if an exception was expected but not thrown
            if ($koan->expectedException !== null) {
                $this->failedTests++;
                $message = "Failed asserting that exception of type {$koan->expectedException} was thrown.";
                $e = new KoansAssertionException($message);
                $this->printFailure($testDox, $e, 0);
                
                if ($this->firstFailure === null) {
                    $this->firstFailure = [
                        'koan' => $this->currentKoan,
                        'test' => $testDox,
                        'method' => $methodName,
                        'message' => $message,
                        'file' => '',
                        'line' => 0
                    ];
                }
                return;
            }
            
            $this->passedTests++;
            $this->printSuccess($testDox);
        } catch (KoansAssertionException $e) {
            $this->failedTests++;
            
            // Get the actual line number where the assertion failed
            $trace = $e->getTrace();
            $testLine = $e->getLine();
            
            // Find the line in the test file (not in KoansTestCase)
            foreach ($trace as $frame) {
                if (isset($frame['file']) && $this->isSameFile($frame['file'], $this->currentKoan)) {
                    $testLine = $frame['line'];
                    break;
                }
            }
            
            $this->printFailure($testDox, $e, $testLine);
            
            if ($this->firstFailure === null) {
                $this->firstFailure = [
                    'koan' => $this->currentKoan,
                    'test' => $testDox,
                    'method' => $methodName,
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $testLine
                ];
            }
        } catch (\Exception $e) {
            // Check if this exception was expected
            if ($koan->expectedException !== null) {
                $exceptionClass = get_class($e);
                
                // Check if the exception class matches
                if (!($e instanceof $koan->expectedException)) {
                    $this->failedTests++;
                    $message = "Failed asserting that exception of type {$exceptionClass} matches expected exception type {$koan->expectedException}.";
                    $assertionException = new KoansAssertionException($message);
                    $this->printFailure($testDox, $assertionException, $e->getLine());
                    
                    if ($this->firstFailure === null) {
                        $this->firstFailure = [
                            'koan' => $this->currentKoan,
                            'test' => $testDox,
                            'method' => $methodName,
                            'message' => $message,
                            'file' => $e->getFile(),
                            'line' => $e->getLine()
                        ];
                    }
                    return;
                }
                
                // Check if the exception message matches (if specified)
                if ($koan->expectedExceptionMessage !== null && $e->getMessage() !== $koan->expectedExceptionMessage) {
                    $this->failedTests++;
                    $message = "Failed asserting that exception message '{$e->getMessage()}' matches expected message '{$koan->expectedExceptionMessage}'.";
                    $assertionException = new KoansAssertionException($message);
                    $this->printFailure($testDox, $assertionException, $e->getLine());
                    
                    if ($this->firstFailure === null) {
                        $this->firstFailure = [
                            'koan' => $this->currentKoan,
                            'test' => $testDox,
                            'method' => $methodName,
                            'message' => $message,
                            'file' => $e->getFile(),
                            'line' => $e->getLine()
                        ];
                    }
                    return;
                }
                
                // Exception matched expectations - test passed
                $this->passedTests++;
                $this->printSuccess($testDox);
            } else {
                // Exception was not expected - this is an error
                $this->failedTests++;
                
                // Get the actual line number where the error occurred
                $testLine = $e->getLine();
                
                $this->printError($testDox, $e, $testLine);
                
                if ($this->firstFailure === null) {
                    $this->firstFailure = [
                        'koan' => $this->currentKoan,
                        'test' => $testDox,
                        'method' => $methodName,
                        'message' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $testLine
                    ];
                }
            }
        }
    }

    /**
     * Get class name from file path
     */
    private function getClassNameFromFile($file)
    {
        $baseName = basename($file, '.php');
        return "Koans\\$baseName";
    }

    /**
     * Check if two file paths point to the same file
     */
    private function isSameFile($file1, $file2)
    {
        // Normalize paths for comparison
        $file1 = str_replace('\\', '/', $file1);
        $file2 = str_replace('\\', '/', $file2);
        
        // Get the basename to compare
        $base1 = basename($file1);
        $base2 = basename($file2);
        
        // Check if filenames match and if file1 ends with file2 path
        return $base1 === $base2 && (strpos($file1, $file2) !== false || strpos($file2, $file1) !== false);
    }

    /**
     * Print test header
     */
    private function printHeader()
    {
        echo "\n";
        echo "╔════════════════════════════════════════════════════════════════╗\n";
        echo "║                ".$this->colorize("PHP Koans - Path to Enlightenment", "yellow")."               ║\n";
        echo "╚════════════════════════════════════════════════════════════════╝\n";
    }

    /**
     * Print success message
     */
    private function printSuccess($testDox)
    {
        echo "  ✓ " . $this->colorize($testDox, 'green') . "\n";
    }

    /**
     * Print failure message
     */
    private function printFailure($testDox, $exception, $line)
    {
        echo "  ✗ " . $this->colorize($testDox, 'red');
        echo " " . $this->colorize("(Line {$line})", 'yellow') . "\n";
        echo "     " . $this->colorize($exception->getMessage(), 'yellow') . "\n";
    }

    /**
     * Print error message
     */
    private function printError($testDox, $exception, $line)
    {
        echo "  ⚠ " . $this->colorize($testDox . " (Error)", 'yellow');
        echo " " . $this->colorize("(Line {$line})", 'yellow') . "\n";
    }

    /**
     * Print summary
     */
    private function printSummary()
    {
        echo "\n";
        echo str_repeat("─", 64) . "\n";

        if ($this->firstFailure === null) {
            // All tests passed!
            echo $this->colorize("🎉 Congratulations! All koans have been completed!", 'green') . "\n";
            echo $this->colorize("   You have reached enlightenment! 🧘‍♂️✨", 'green') . "\n";
            echo "\n";
            echo str_repeat("─", 64) . "\n";
        }
        
        $passedColor = $this->passedTests > 0 ? 'green' : 'white';
        $remainingTests = $this->totalTestsInProject - $this->passedTests;
        
        echo "Tests: " . $this->colorize("{$this->passedTests} passed!", $passedColor) . "\n";
        
        if ($this->totalTestsInProject > 0) {
            $percentage = round(($this->passedTests / $this->totalTestsInProject) * 100, 1);
            echo "Progress: {$this->passedTests}/{$this->totalTestsInProject} tests completed ({$percentage}%)";
            echo " - " . $this->colorize("{$remainingTests} remaining", 'yellow') . "\n";
        }
        echo "\n";
    }

    /**
     * Colorize text for terminal output
     */
    private function colorize($text, $color)
    {
        $colors = [
            'green' => "\033[32m",
            'red' => "\033[31m",
            'yellow' => "\033[33m",
            'cyan' => "\033[36m",
            'white' => "\033[37m",
            'reset' => "\033[0m"
        ];

        $colorCode = $colors[$color] ?? $colors['white'];
        return $colorCode . $text . $colors['reset'];
    }
}

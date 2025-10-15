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
            'koans/AboutIsEvenMiniProject.php',
            'koans/AboutTriangleProject.php',
            'koans/AboutStrings.php',
            'koans/AboutStringManipulation.php',
            'koans/AboutFizzBuzzProject.php',
            'koans/AboutArrays.php',
            'koans/AboutArrayAssignment.php',
            'koans/AboutAssociativeArray.php',
            'koans/AboutCallbackFunctions.php',
            'koans/AboutClasses.php',
            'koans/AboutObjects.php',
            'koans/AboutNull.php',
            'koans/AboutDataTypes.php',
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
        $className = $this->getClassNameFromFile($koanFile);
        
        if (!class_exists($className)) {
            echo "⚠️  Warning: Class $className not found in $koanFile\n";
            return;
        }

        $this->currentKoan = basename($koanFile, '.php');
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

        try {
            $koan->$methodName();
            $this->passedTests++;
            $this->printSuccess($testDox);
        } catch (KoansAssertionException $e) {
            $this->failedTests++;
            
            // Get the actual line number where the assertion failed
            $trace = $e->getTrace();
            $testLine = $e->getLine();
            
            // Find the line in the test file (not in KoansTestCase)
            foreach ($trace as $frame) {
                if (isset($frame['file']) && basename($frame['file']) === $this->currentKoan . '.php') {
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

    /**
     * Get class name from file path
     */
    private function getClassNameFromFile($file)
    {
        $baseName = basename($file, '.php');
        return "Koans\\$baseName";
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

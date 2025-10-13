<?php

namespace KoansLib;

class KoansRunner
{
    private $koansPath;
    private $passedTests = 0;
    private $failedTests = 0;
    private $totalTests = 0;
    private $firstFailure = null;
    private $currentKoan = null;

    public function __construct($koansPath = 'koans')
    {
        $this->koansPath = $koansPath;
    }

    /**
     * Run all koans
     */
    public function run()
    {
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
     * Discover all koan files
     */
    private function discoverKoans()
    {
        $files = glob($this->koansPath . '/About*.php');
        sort($files);
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
            $this->printFailure($testDox, $e);
            
            if ($this->firstFailure === null) {
                $this->firstFailure = [
                    'koan' => $this->currentKoan,
                    'test' => $testDox,
                    'method' => $methodName,
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ];
            }
        } catch (\Exception $e) {
            $this->failedTests++;
            $this->printError($testDox, $e);
            
            if ($this->firstFailure === null) {
                $this->firstFailure = [
                    'koan' => $this->currentKoan,
                    'test' => $testDox,
                    'method' => $methodName,
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
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
        echo "║              🧘 PHP Koans - Path to Enlightenment              ║\n";
        echo "╚════════════════════════════════════════════════════════════════╝\n";
        echo "\n";
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
    private function printFailure($testDox, $exception)
    {
        echo "  ✗ " . $this->colorize($testDox, 'red') . "\n";
    }

    /**
     * Print error message
     */
    private function printError($testDox, $exception)
    {
        echo "  ⚠ " . $this->colorize($testDox . " (Error)", 'yellow') . "\n";
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
        } else {
            // Show first failure
            $failure = $this->firstFailure;
            
            echo $this->colorize("🔍 You have not yet reached enlightenment...", 'red') . "\n";
            echo $this->colorize("   The answers you seek are within {$failure['koan']}", 'yellow') . "\n";
            echo "\n";
            echo $this->colorize("📍 Failed Test:", 'red') . "\n";
            echo "   {$failure['test']}\n";
            echo "\n";
            echo $this->colorize("💡 Hint:", 'yellow') . "\n";
            echo "   {$failure['message']}\n";
            echo "\n";
            echo $this->colorize("📄 Location:", 'cyan') . "\n";
            echo "   File: {$failure['file']}\n";
            echo "   Line: {$failure['line']}\n";
            echo "\n";
            echo $this->colorize("🎯 What to do next:", 'yellow') . "\n";
            echo "   1. Open the file mentioned above\n";
            echo "   2. Find the test method: {$failure['method']}()\n";
            echo "   3. Replace __ (double underscore) with the correct value\n";
            echo "   4. Save the file and the tests will run automatically\n";
        }

        echo "\n";
        echo str_repeat("─", 64) . "\n";
        
        $passedColor = $this->passedTests > 0 ? 'green' : 'white';
        $failedColor = $this->failedTests > 0 ? 'red' : 'white';
        
        echo "Tests: " . $this->colorize("{$this->passedTests} passed", $passedColor);
        echo ", " . $this->colorize("{$this->failedTests} failed", $failedColor);
        echo ", {$this->totalTests} total\n";
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

<?php

require 'vendor/autoload.php';

$koans = glob(__DIR__ . '/koans/*.php');

// Count all test methods
function countTestMethodsInFiles(array $files): int {
    $total = 0;
    foreach ($files as $file) {
        $contents = file_get_contents($file);
        preg_match_all('/function\s+(test\w+)\s*\(/', $contents, $matches);
        $total += count($matches[1]);
    }
    return $total;
}

$totalTests = countTestMethodsInFiles($koans);
$completedTests = 0;

foreach ($koans as $file) {
    echo "Running: $file\n";

    $output = [];
    $exitCode = 0;

    // exec("vendor/bin/phpunit --colors=never --filter '' $file", $output, $exitCode);
    exec("vendor\bin\phpunit.bat --colors=never --filter '' $file", $output, $exitCode);
   
    // Count how many passed
    $passed = 0;
    foreach ($output as $line) {
        if (preg_match('/OK \((\d+) test/', $line, $matches)) {
            $passed = (int)$matches[1];
            break;
        }
    }

    $completedTests += $passed;

    if ($exitCode !== 0) {
        echo "\nAbout" . basename($file, '.php') . " has damaged your karma.\n";
        echo "\nThe Master says:\n  You have not yet reached enlightenment.\n";

        echo "\nThe answers you seek...\n";

        foreach ($output as $line) {
            if (stripos($line, 'FAILURES!') !== false ||
                stripos($line, 'ERROR') !== false ||
                stripos($line, 'FAILURE') !== false ||
                stripos($line, 'AssertionFailedError') !== false) {
                echo "  $line\n";
            }
        }

        echo "\nPlease meditate on the following code:\n";
        echo "  $file\n";

        $bar = str_repeat('X', $completedTests) . str_repeat('_', $totalTests - $completedTests);
        echo "\nmountains are merely mountains\n";
        echo "your path thus far [$bar] $completedTests/$totalTests\n";
        exit(1);
    }
}

echo "Congratulations, seeker!\nYou have reached enlightenment.\n";

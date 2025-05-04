<?php

require 'vendor/autoload.php';

$koans = glob(__DIR__ . '/koans/*.php');

$total = count($koans);
$current = 0;

foreach ($koans as $file) {
    $current++;

    echo "Running: $file\n";

    $output = [];
    $exitCode = 0;

    exec("vendor\bin\phpunit.bat --colors=never --filter '' $file", $output, $exitCode);
    // exec("vendor/bin/phpunit --colors=never --filter '' $file", $output, $exitCode);

    if ($exitCode !== 0) {
        echo "About" . basename($file, '.php') . " has damaged your karma.\n";
        echo "\nThe Master says:\n  You have not yet reached enlightenment.\n";
        echo "\nThe answers you seek...\n";

        foreach ($output as $line) {
            if (stripos($line, 'FAILURES!') !== false || stripos($line, 'FAILURE') !== false || stripos($line, 'Error') !== false) {
                echo "  $line\n";
            }
        }

        echo "\nPlease meditate on the following code:\n";
        echo "  $file\n";

        $bar = str_repeat('X', $current - 1) . '_' . str_repeat('_', $total - $current);
        echo "\nmountains are merely mountains\n";
        echo "your path thus far [$bar] $current/$total\n";

        exit(1);
    }
}

echo "Congratulations, seeker!\nYou have reached enlightenment.\n";

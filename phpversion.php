<?php
echo "You're using PHP " . PHP_VERSION . "\n";
echo "You're using PHP_VERSION_ID " . PHP_VERSION_ID . "\n";
if (PHP_VERSION_ID < 80000) {
    echo "Named arguments are not available.\n";
}
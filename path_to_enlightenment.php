<?php

// Define the __ placeholder constant
define('__', '__FILL_ME_IN__');
define('____', !('__FILL_ME_IN__'));

// Simple PSR-4 autoloader
spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $prefix = 'KoansLib\\';
    $base_dir = __DIR__ . '/KoansLib/';
    
    // Does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    // Get the relative class name
    $relative_class = substr($class, $len);
    
    // Replace namespace separators with directory separators
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    // If the file exists, require it
    if (file_exists($file)) {
        require_once $file;
    }
});

use KoansLib\KoansRunner;

// Run the koans
$runner = new KoansRunner('koans');
$exitCode = $runner->run();

exit($exitCode);

<?php

$os = PHP_OS_FAMILY;

switch ($os) {
    case 'Windows':
        $binary = 'watcher-Windows.exe';
        break;
    case 'Darwin':
        $binary = './watcher-macOS';
        break;
    case 'Linux':
        $binary = './watcher-Linux';
        break;
    default:
        fwrite(STDERR, "❌ Unsupported OS: $os\n");
        exit(1);
}

echo "🚀 Running watcher for $os: $binary\n";
passthru($binary);

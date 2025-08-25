
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Alle Dateien in boot/ rekursiv laden
$bootDir = __DIR__;
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($bootDir, FilesystemIterator::SKIP_DOTS)
);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php' && $file->getFilename() !== 'bootstrap.php') {
        require_once $file->getPathname();
    }
}

// Autoloader für klassenPHP
spl_autoload_register(function ($class) {
    $baseDir = getcwd() . '/klassenPHP/';
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});


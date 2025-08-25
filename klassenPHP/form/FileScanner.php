<?php
abstract class FileScanner {
    protected $baseDir;
    protected $extension;
    protected $files = [];

    public function __construct($baseDir, $extension) {
        $this->baseDir = rtrim($baseDir, '/');
        $this->extension = $extension;
    }

    public function scan() {
        $this->files = []; // Reset before scanning
        $this->scanDir($this->baseDir);
    }

    private function scanDir($dir) {
        foreach (scandir($dir) as $item) {
            if ($item === '.' || $item === '..') continue;

            $path = "$dir/$item";

            if (is_dir($path)) {
                $this->scanDir($path);
            } elseif (is_file($path) && pathinfo($path, PATHINFO_EXTENSION) === $this->extension) {
                $this->files[] = ['path' => $path, 'filename' => $item];
            }
        }
    }

    public function getFiles() {
        return $this->files;
    }

    // Optional: Unterklasse kann eigene Verarbeitung definieren
    abstract public function processFiles();
}

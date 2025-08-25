<?php

class FileTree
{
    private string $rootPath;

    public function __construct(string $path = null)
    {
        $this->rootPath = $path ?? getcwd(); // Nutzt aktuellen Pfad, wenn keiner angegeben
    }

    public function listTree(): array
    {
        return $this->scanDirectory($this->rootPath);
    }

    private function scanDirectory(string $dir): array
{
    $result = [];

    if (!is_readable($dir)) {
        return ["error" => "Permission denied: $dir"];
    }

    $items = scandir($dir);
    if ($items === false) {
        return ["error" => "Failed to read: $dir"];
    }

    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        if (str_starts_with($item, '.')) continue; // ⛔ Versteckte Datei/Ordner überspringen

        $fullPath = $dir . DIRECTORY_SEPARATOR . $item;

        if (is_dir($fullPath)) {
            $result[$item] = $this->scanDirectory($fullPath);
        } else {
            $result[] = $item;
        }
    }

    return $result;
}

}

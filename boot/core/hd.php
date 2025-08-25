<?php
class hd {
    private string $root;

    public function __construct(string $rootPath = __DIR__) {
        $this->root = realpath($rootPath) ?: $rootPath;
    }

    public function get(string $relativePath): ?string {
        $fullPath = $this->resolve($relativePath);
        return file_exists($fullPath) ? file_get_contents($fullPath) : null;
    }

    public function set(string $content, string $relativePath): bool {
        $fullPath = $this->resolve($relativePath);
        $dir = dirname($fullPath);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        if ($this->check($relativePath)) {
            $backupPath = "versuch_" . basename($relativePath);
            $this->set($content, $backupPath); 
        }

        return file_put_contents($fullPath, $content) !== false;
    }

    public function check(string $relativePath): bool {
        return file_exists($this->resolve($relativePath));
    }

    public function resolve(string $relativePath): string {
        return rtrim($this->root, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . ltrim($relativePath, "/\\");
    }
}

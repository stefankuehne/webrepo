class JsonStore extends AbstractStore {
    private string $path;

    public function __construct(string $path) {
        $this->path = $path;
    }

    public function load(string $key): mixed {
        $file = $this->path . '/' . $this->fullKey($key) . '.json';
        return file_exists($file) ? json_decode(file_get_contents($file), true) : null;
    }

    public function save(string $key, mixed $data): bool {
        $file = $this->path . '/' . $this->fullKey($key) . '.json';
        return file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT)) !== false;
    }

    public function delete(string $key): bool {
        $file = $this->path . '/' . $this->fullKey($key) . '.json';
        return file_exists($file) ? unlink($file) : false;
    }
}

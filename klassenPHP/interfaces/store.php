interface StoreInterface {
    public function load(string $key): mixed;
    public function save(string $key, mixed $data): bool;
    public function delete(string $key): bool;
}

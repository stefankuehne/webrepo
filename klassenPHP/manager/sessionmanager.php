class sessionmanager {
    private array $sessions = [];

    public function create(string $user_id): string {
        $id = uniqid("sess_", true);
        $this->sessions[$id] = [
            'user_id' => $user_id,
            'created_at' => time(),
            'expires_at' => time() + 1800,
            'data' => [],
            'is_valid' => true
        ];
        return $id;
    }

    public function get(string $id): ?array {
        return $this->sessions[$id] ?? null;
    }

    public function setData(string $id, string $key, mixed $value): void {
        if (isset($this->sessions[$id])) {
            $this->sessions[$id]['data'][$key] = $value;
        }
    }

    public function invalidate(string $id): void {
        if (isset($this->sessions[$id])) {
            $this->sessions[$id]['is_valid'] = false;
        }
    }
}

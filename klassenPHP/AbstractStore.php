abstract class AbstractStore implements StoreInterface {
    protected string $prefix = "";

    public function setPrefix(string $prefix): void {
        $this->prefix = $prefix;
    }

    protected function fullKey(string $key): string {
        return $this->prefix . $key;
    }
}

<?php

class Node {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function __destruct() {
        // Optional: Ressourcenfreigabe oder Logging
    }
}

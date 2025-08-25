<?php

class DataStructure {
    public ?Zeiger $start;

    public function __construct(?Zeiger $start = null) {
        $this->start = $start;
    }

    public function __destruct() {
        // Optional: z. B. Speicherbereinigung
    }
}

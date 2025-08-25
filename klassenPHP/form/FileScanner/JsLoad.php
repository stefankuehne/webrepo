<?php
class JsLoad extends FileScanner {
    private $store;

    public function __construct($jsonFile, $baseDir = 'js') {
        parent::__construct($baseDir, 'js');
        $this->store = new JsonStore($jsonFile);
    }

    public function processFiles() {
        foreach ($this->getFiles() as $file) {
            $this->store->add($file['path'], $file['filename']);
        }
    }

    public function getData() {
        return $this->store->getData();
    }
}


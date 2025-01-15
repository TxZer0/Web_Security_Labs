<?php
class File {
    public $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function __toString() {
        return file_get_contents($this->filename);
    }

}
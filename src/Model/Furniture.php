<?php
require_once('Product.php');

class Furniture extends Product {
    private $height;
    private $width;
    private $length;

    public function __construct() {}   
        
    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }
    
    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length) {
        $this->length = $length;
    }

}

?>
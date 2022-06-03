<?php
require_once('Product.php');

class Dvd extends Product {
    private $size;

    public function __construct() {}
    
    public function getSize() {
        return $this->size;
    }

    public function setSize($size) {
        $this->size = $size;
    } 

}

?>
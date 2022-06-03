<?php 
require_once('Product.php');

class Book extends Product {
    private $weight;

    public function __construct() {}
    
    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    } 

}

?>
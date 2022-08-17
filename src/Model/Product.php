<?php 

class Product {
    private $sku;
    private $name;
    private $price;
    private $type;

    public function __construct(){
        
    }
    
    public function getInfo(){
        return "{$this->sku} <br>{$this->name} <br>{$this->price} $";        
    }
    
    public function getSku() {
        return $this->sku;
    }

    public function setSku($sku) {
        $this->sku = $sku;
    } 

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

}

?>
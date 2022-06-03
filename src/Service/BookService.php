<?php 
require_once('Service.php');
require_once('../Database/Database.php');

class BookService extends Service {
    public $db;
    
    public function __construct(){
        $this->db = new Database();
    }

    public function create($productModel, $data){

        $productModel->setWeight($data['weight']);

        $query = "INSERT INTO book (sku, weight) 
                            VALUES (
                                    '" . $productModel->getSku() . "', 
                                    " . $productModel->getWeight() . "
                            );";
    
        $sql = $this->db->conn->query($query);

        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function findAll(){
        $this->db->query('SELECT * FROM product');

        $results = $this->db->resultSet();

        return $results;
    }

    public function findById($id){
        $this->db->query('SELECT * FROM product WHERE id = :id');
        $this->db->bind(':id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($skus){
        
        $sql = $this->db->conn->query("DELETE FROM book WHERE sku IN ($skus)");

        if($sql){
            return true;
        }else{
            return false;
        }     
    }
        
}
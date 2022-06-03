<?php 
require_once('Service.php');
require_once('../Database/Database.php');

class DvdService extends Service {
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function create($productModel, $data){

        $productModel->setSize($data['size']);

        $query = "INSERT INTO dvd (sku, size)
                            VALUES (
                                    '" . $productModel->getSku() . "',
                                    " . $productModel->getSize() . "
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
        
        $sql = $this->db->conn->query("DELETE FROM dvd WHERE sku IN ($skus)");

        if($sql){
            return true;
        }else{
            return false;
        }
    }

}

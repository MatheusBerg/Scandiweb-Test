<?php 
require_once('Service.php');
require_once('BookService.php');
require_once('DVDService.php');
require_once('FurnitureService.php');
require_once('../Database/Database.php');

class ProductService extends Service {
    public $db;
    public $subService;
    public $productModel;
    
    public function __construct($type = 'Product'){
        $this->db = new Database();
        if ($type != 'Product') {
            $this->subService = $this->service($type);
        }
        
    }

    public function create($data, $type){

        $this->productModel = $this->model($type);

        $this->productModel->setSku($data['sku']);
        $this->productModel->setName($data['name']);
        $this->productModel->setPrice($data['price']);
        $this->productModel->setType($type);

        $query = "INSERT INTO product (sku, name, price, type) 
                            VALUES (
                                    '" . $this->productModel->getSku() . "', 
                                    '" . $this->productModel->getName() . "', 
                                    '" . $this->productModel->getPrice() . "', 
                                    '" . $this->productModel->getType() . "'
                            );
                        ";

        $sql = $this->db->conn->query($query);

        if ($sql) {
            $this->subService = $this->service($type);
            if($this->subService->create($this->productModel, $data)){
                return true;
            }else{
                return false;
            }
        }
        
        
    }

    public function findAll(){
        $data = null;

        $query = "SELECT product.sku, name, price, type, size, weight, height, width, length 
                    FROM product 
                    LEFT JOIN dvd ON product.sku = dvd.sku
                    LEFT JOIN book ON product.sku = book.sku
                    LEFT JOIN furniture ON product.sku = furniture.sku";

        $sql = $this->db->conn->query($query);

        if ($sql) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;

    }

    public function delete($product_skus){

        $bookService = new BookService();
        $dvdService = new DVDService();
        $furnitureService = new FurnitureService();        

        $pks = "'" . implode("', '", $product_skus)  . "'";

        $bookService->delete($pks);
        $dvdService->delete($pks);
        $furnitureService->delete($pks);        

        $sql = $this->db->conn->query("DELETE FROM product WHERE sku IN ($pks)");

        if($sql) {
            return true;
        }else{
            return false;
        }
    }

        
}
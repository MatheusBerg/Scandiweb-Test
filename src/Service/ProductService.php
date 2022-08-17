<?php 
require_once('Service.php');
require_once('BookService.php');
require_once('DVDService.php');
require_once('FurnitureService.php');
require_once('../Database/Database.php');
require_once('../Model/Book.php');
require_once('../Model/DVD.php');
require_once('../Model/Furniture.php');

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

        $bookQuery = "SELECT * FROM product LEFT JOIN book ON product.sku = book.sku WHERE product.type = 'book'";
        $dvdQuery = "SELECT * FROM product LEFT JOIN dvd ON product.sku = dvd.sku WHERE product.type = 'dvd'";
        $furnitureQuery = "SELECT * FROM product LEFT JOIN furniture ON product.sku = furniture.sku WHERE product.type = 'furniture'";
        
        $sqlBook = $this->db->conn->query($bookQuery);
        $sqlDVD = $this->db->conn->query($dvdQuery);
        $sqlFurniture = $this->db->conn->query($furnitureQuery);

        if ($sqlBook) {
            while ($row = mysqli_fetch_assoc($sqlBook)) {
                $book = new Book();
                $book->setSku($row['sku']);
                $book->setName($row['name']);
                $book->setPrice($row['price']);
                $book->setType($row['type']);
                $book->setWeight($row['weight']);
                $data[] = $book;
            }
        }

        if ($sqlDVD) {
            while ($row = mysqli_fetch_assoc($sqlDVD)) {
                $dvd = new DVD();
                $dvd->setSku($row['sku']);
                $dvd->setName($row['name']);
                $dvd->setPrice($row['price']);
                $dvd->setType($row['type']);
                $dvd->setSize($row['size']);
                $data[] = $dvd;
            }
        }

        if ($sqlFurniture) {
            while ($row = mysqli_fetch_assoc($sqlFurniture)) {
                $furniture = new Furniture();
                $furniture->setSku($row['sku']);
                $furniture->setName($row['name']);
                $furniture->setPrice($row['price']);
                $furniture->setType($row['type']);
                $furniture->setHeight($row['height']);
                $furniture->setWidth($row['width']);
                $furniture->setLength($row['length']);

                $data[] = $furniture;
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
<?php 
require_once('Controller.php');

class ProductController extends Controller {
    public $productService;

    public function __construct($type = 'Product') {
        $this->productService = $this->service($type);
    }
    
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'sku' => trim($_POST['sku']),
                'name' => trim($_POST['name']),
                'price' => $_POST['price'],
                'size' => $_POST['size'],
                'height' => $_POST['height'],
                'width' => $_POST['width'],
                'length' => $_POST['length'],
                'weight' => $_POST['weight'],
                'productType' => $_POST['productType']
            ];

            if ($this->productService->create($data, $data['productType'])) {
                echo "<script>window.location.href = '/' </script>";
            } else {
                echo "An error has ocurred!";
            }
        }
                
    }

    public function findAll() {
        $products = $this->productService->findAll();

        return $this->view('index', $products);
    }

    public function delete() {
        if (isset($_POST['checkbox'])) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST);
    
                $product_skus = (!empty($_POST['checkbox'])) ? $_POST['checkbox'] : [];

                if ($product_skus) {
                    if ($this->productService->delete($product_skus)) {
                        echo "<script>window.location.href = '/' </script>";
                    } else {
                        echo "An error has ocurred!";
                    }
                }
            }
        }

        return $this->view('index');
    }
    

}

?>
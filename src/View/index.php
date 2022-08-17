<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../public/css/index.css">
</head>

<body>    
    
    <form action="" method="POST">
        <header>
            <div class="header-wrapper">
                <h1>Product List</h1>
                <div class="header-buttons">                    
                    <a href="/add-product" class="button">ADD</a>
                    <button type="submit" id="delete-product-btn">MASS DELETE</button>                     
                </div>
            </div>
        </header>
        
        <main>
            <div class="products-blocks">
                
                
                <?php
                include_once '../Controller/ProductController.php';                
                $productController = new ProductController();
                $datas = $productController->findAll(); 
                $productController->delete();                              
                ?>                
                
                <?php
                

                if(!empty($datas)){
                    foreach($datas as $data){ 
                        ?>
              <div class="products">
                  
                  <input class="delete-checkbox" name="checkbox[]" type="checkbox" value="<?php echo $data->getSku(); ?>">
                                  
                  <h6><?php echo $data->getInfo()?></h6> 
                                   
                </div>
                
                <?php
                }
            }else{
                echo "no data";
            }
            
            ?>     
            
            </div>
        </main>
    
    <footer>
        <h2>Scandiweb Test assignment</h2>
    </footer>
    </form>
    
</body>
</html>
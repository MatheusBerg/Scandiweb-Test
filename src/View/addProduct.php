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

    <link rel="stylesheet" href="../../public/css/addProduct.css">

    <script src="../../public/js/script.js" defer></script>    

</head>

<body>

    <?php

    include_once '../Controller/ProductController.php';
    $productController = new ProductController();
    $create = $productController->create();

    ?>
    
    <form action="" method="POST" onsubmit="return checkInputs()" id="product-form">
        <header>
            <div class="header-wrapper">
                <h1>Product Add</h1>
                <div class="header-buttons">
                    <button type="submit" name="submit">SAVE</button>
                    <a href="index.php" class="button">CANCEL</a> 
                </div>
            </div>
        </header>

        <fieldset>
          <div class="fieldset-area">

            <div class="sku">
              <div class="input-wrapper">
                <div class="sku-wrapper">
                  <label for="sku">SKU</label>
                  <input type="text" id="sku" name="sku" placeholder="Min 7 characteres"/>
                  <div class="error"></div>
                </div>                
              </div>          
            </div>
            
            <div class="name">
              <div class="input-wrapper">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="(Max 100 characteres)"/>
                <div class="error"></div>
              </div>
            </div>
            
            <div class="price">
              <div class="input-wrapper">
                <label for="price">Price ($)</label>
                <input type="text" id="price" name="price" placeholder="(numbers only)"/>
                <div class="error"></div>
              </div>
            </div>
            
            <div class="type-switcher">
              <div class="input-wrapper">
                <label for="productType">Type Switcher</label>
                <select name="productType" id="productType" >
                  <option disabled selected>Select</option>
                  <option value="Dvd">Dvd</option>
                  <option value="Furniture">Furniture</option>
                  <option value="Book">Book</option>
                </select>
                <div class="error"></div>
              </div>
            </div>
            
            <div class="hide size">
              <div class="input-wrapper">
                <label for="size">Please, provide size</label>
                <input type="text" id="size" name="size" placeholder="(numbers only)"/>
                <div class="error"></div>
              </div>
            </div>
            
            <div class="hide dimension">
              <div class="input-wrapper">
                <div class="dimension-wrapper">
                  <label for="height">Height (CM)</label>
                  <input type="text" id="height" name="height" placeholder="(numbers only)"/>
                  <div class="error"></div>
                </div>
                <div class="dimension-wrapper">
                  <label for="width">Width (CM)</label>
                  <input type="text" id="width" name="width" placeholder="(numbers only)"/>
                  <div class="error"></div>
                </div>
                <div class="dimension-wrapper">
                  <label for="length">Length (CM)</label>
                  <input type="text" id="length" name="length" placeholder="(numbers only)"/>
                  <div class="error"></div>
                </div>
                <div class="dimension-wrapper">
                  <h2>Please, provide dimensions</h2>
                </div>              
              </div>
            </div>
            
            <div class="hide weight">
              <div class="input-wrapper">
                <label for="weight">Please, provide weight</label>
                <input type="text" id="weight" name="weight" placeholder="(numbers only)"/>
                <div class="error"></div>
              </div>
            </div>
          </div>
      </fieldset>
      
    </form>

    <footer>
        <h2>Scandiweb Test assignment</h2>
    </footer>
       
</body>
</html>
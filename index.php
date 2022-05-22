<?php
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    ul > li {
        list-style-type: none;
    }
</style>
<body>
    
<div class="container border">
<header class="row">
        <h1 class="col-8 mt-2">Product List</h1>
        <div class="col-4 mt-3">
        <a href="addProduct.php"><button class="btn-primary">Add</button></a>
        <button class="delete-product-btn btn-danger">Mass Delete</button>
        </div>
</header>
<hr/>
     <section>
        <?php
        include 'productList.php';       
          $product = new ProductList;
        $product->getProducts();
          ?>
          <div class="border w-25 d-flex p-2" >
          <input type="checkbox" class="">
          <ul>
              <li>JVC200123</li>
              <li>Acme DISC</li>
              <li>1.00$</li>
              <li>Size: 700 MB</li>
          </ul>
          </div>
        
     </section> 
     <footer>
         <hr />
        <p class="d-flex justify-content-center">Scandiweb Test assignment</p>
    </footer>
</div>
   
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script>
    
</script>

</body>
</html>
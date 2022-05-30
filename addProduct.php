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
    .dynamic{
        display: none;
    }
</style>
<body>
    <div class="container border">
    <header class="row">
        <h1 class="col-8 mt-2">Product Add</h1>
        
        <div class="col-4 mt-3">
            <button type="submit" name="submit" form="product_form" class="btn-primary">Save</button>
            <button form="product_form" class="btn-danger">Cancel</button>
            <a href="index.php">back</a>

        </div>
    </header>
    <hr/>
    <section class="d-flex justify-content-center">
        <form id="product_form" action="productInput.php" method="POST">
        <div>
            <div>
                <label for="">SKU</label>
                <input type="text" id="sku" name="sku">

            </div>
            <div class="mt-3">
                <label for="">Name</label>
                <input type="text" id="name" name="name">

            </div>
            <div class="mt-3">
                <label for="">Price($)</label>
                <input type="text" id="price" name="price">

            </div>
            <div class="mt-3">
                <label for="">Type Switcher</label>
                <select name="type" id="productType" class="mt-3">
                <option selected disabled>Type switcher</option>
    <option value="DVD" >DVD</option>
    <option value="Furniture">Furniture</option>
    <option value="Book">Book</option>
   
  </select>

            </div>
          
          <div id="DVD" class="dynamic mt-3">
            <div>
                <h6>Please provide size in megabyte</h6>
                <label for="">Size(MB)</label>
                <input type="text" id="size" name="size">

            </div>
            </div>
            <div id="Book" class="dynamic  mt-3">
<div>
<h6>Please provide weight in kilogram</h6>
                <label for="">Weight(KG)</label>
                <input type="text" id="weight" name="weight">

            </div>

</div>
            <div id="Furniture" class="dynamic mt-3">
            <div>
            <h6>Please provide height in centimeter</h6>
                <label for="">Height(CM)</label>
                <input type="text" id="height" name="height">

            </div>
            <div class="mt-3">
            <h6>Please provide width in centimeter</h6>
                <label for="">Width(CM)</label>
                <input type="text" id="width" name="width">

            </div>
            <div class="mt-3">
            <h6>Please provide length in centimeter</h6>
                <label for="">Length(CM)</label>
                <input type="text" id="length" name="length">

            </div>  
        </div>
      
       
        </form>
    </section>
    <hr />
    <footer class="d-flex justify-content-center">
        <p >Scandiweb Test assignment</p>
    </footer>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#productType').on('change',function(){
                $(".dynamic").hide();
               $("#" + $(this).val()).fadeIn(700);

            }).change();
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <button type="submit" id="submit" name="submit" form="product_form" class="btn-primary">Save</button>
           
            <a href="index.php"> <button class="btn-danger">Cancel</button></a>

        </div>
    </header>
    <hr/>
    <section class="d-flex justify-content-center">
        <form id="product_form" action="productInput.php" method="POST">
        <div>
            <div>
                <label for="">SKU</label>
                <input type="text" id="sku" name="sku">
                <span id="errorSku" style="display: none" class="text-danger error"></span>
              
            </div>
          
            <div class="mt-3">
                <label for="">Name</label>
                <input type="text" id="name" name="name">
                <span id="errorName" style="display: none" class="text-danger error"></span>

            </div>
            <div class="mt-3">
                <label for="">Price($)</label>
                <input type="text" id="price" name="price">
                <span id="errorPrice" style="display: none" class="text-danger error"></span>
            </div>
            <div class="mt-3">
                <label for="">Type Switcher</label>
                <select name="type" id="productType" class="mt-3">
                <option selected disabled value="">Type switcher</option>
    <option value="DVD" >DVD</option>
    <option value="Furniture">Furniture</option>
    <option value="Book">Book</option>
   
  </select>
  <span id="errorType" style="display: none" class="text-danger error"></span>

            </div>
          
          <div id="DVD" class="dynamic mt-3">
            <div>
                <h6>Please provide size in megabyte</h6>
                <label for="">Size(MB)</label>
                <input type="text" id="size" name="size">
                <span id="errorSize" style="display: none" class="text-danger error"></span>
            </div>
            </div>
            <div id="Book" class="dynamic  mt-3">
<div>
<h6>Please provide weight in kilogram</h6>
                <label for="">Weight(KG)</label>
                <input type="text" id="weight" name="weight">
                <span id="errorWeight" style="display: none" class="text-danger error"></span>
            </div>

</div>
            <div id="Furniture" class="dynamic mt-3">
            <div>
            <h6>Please provide height in centimeter</h6>
                <label for="">Height(CM)</label>
                <input type="text" id="height" name="height">
                <span id="errorHeight" style="display: none" class="text-danger error"></span>

            </div>
            <div class="mt-3">
            <h6>Please provide width in centimeter</h6>
                <label for="">Width(CM)</label>
                <input type="text" id="width" name="width">
                <span id="errorWidth" style="display: none" class="text-danger error"></span>

            </div>
            <div class="mt-3">
            <h6>Please provide length in centimeter</h6>
                <label for="">Length(CM)</label>
                <input type="text" id="length" name="length">
                <span id="errorLength" style="display: none" class="text-danger error"></span>

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
        
            //    $('#sku').blur(function(){
            //     $(".error").hide();
            //         $.fn.skuCheck();     
            //     });
            $('#sku').blur(function(){
                $("#errorSku").hide();
                var sku = $("#sku").val();
                $.fn.skuCheck();
              $.ajax({
type:"POST",
url: "checkSku.php",
data: {
sku: sku
},
success: function(data){
if( data != 0)
{
    $("#errorSku").fadeIn().text("Sku is taken. Try new one");
$("input#sku").focus();
return false;

} 

}
  });
      });
                $.fn.skuCheck = function(){
                    var sku = $("#sku").val();

                   

                    if(sku == ""){
$("#errorSku").fadeIn().text("Sku required.");
$("input#sku").focus();
return false;
}else if(!/[a-zA-Z0-9]+$/.test(sku)){
    $("#errorSku").fadeIn().text("Only alphanumeric string are allowed.");
$("input#sku").focus();
return false;
}
                }
                $.fn.nameCheck = function(){
    var name = $("#name").val();
    if(name == ""){
$("#errorName").fadeIn().text("Name required");
$("input#name").focus();
return false;
}else if(!/^[a-zA-Z\s]+$/.test(name)){
$("#errorName").fadeIn().text("Only alphabets and whitespace are allowed.");
$("input#name").focus();
return false;
}
}
$.fn.priceCheck = function(){
    var price = $("#price").val();
    if(price == ""){
$("#errorPrice").fadeIn().text("Price required");
$("input#price").focus();
return false;
}else if(!/[0-9]/.test(price)){
$("#errorPrice").fadeIn().text("Only integer value");
$("input#price").focus();
return false;   
}

}
$.fn.typeCheck = function(){
    var type = $("#productType").val();
                var size = $("#size").val();
                var weight = $("#weight").val();
                var height = $("#height").val();
                var width = $("#width").val();
                var length = $("#length").val();
if(type == null){
$("#errorType").fadeIn().text("Type required");
$("input#productType").focus();
return false;
}
if(type == "DVD"){
    if(size == ""){
$("#errorSize").fadeIn().text("Size required");
$("input#size").focus();
return false;
} 
}
if(type == "Book"){
    if(weight == ""){
$("#errorWeight").fadeIn().text("Weight required");
$("input#weight").focus();
return false;
}
}
if(type == "Furniture"){
    if(height == ""){
$("#errorWeight").fadeIn().text("Height required");
$("input#height").focus();
return false;
}
if(width == ""){
$("#errorWidth").fadeIn().text("Width required");
$("input#width").focus();
return false;
}
if(length == ""){
$("#errorlength").fadeIn().text("Length required");
$("input#length").focus();
return false;
}
}
}
            $("form").submit(function(event){
                event.preventDefault();
                $(".error").hide();
                var sku = $("#sku").val();
                var name = $("#name").val();
                var price = $("#price").val();
                var type = $("#productType").val();
                var size = $("#size").val();
                var weight = $("#weight").val();
                var height = $("#height").val();
                var width = $("#width").val();
                var length = $("#length").val();
                $.fn.skuCheck();
                $.fn.nameCheck();
                $.fn.priceCheck();
                $.fn.typeCheck();

// ajax
$.ajax({
type:"POST",
url: "productInput.php",
data: {
    sku: sku, name: name, price: price, type: type, size: size, weight: weight, height: height, width: width, length: length
},
success: function(){
    window.location.replace('index.php');
}
            });
});
return false;
});  
    </script>
</body>
</html>
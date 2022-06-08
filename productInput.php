<?php

//Interface definition
interface Product {
    public function dimension($size,$weight,$height,$width,$length);
  }
  
  // Class definitions
  class Book implements Product {
    public function dimension($size,$weight,$height,$width,$length) {
      $_POST['size'] = NULL;
         $_POST['height'] = NULL;
         $_POST['width'] = NULL;
         $_POST['length'] = NULL; 
    }
  }
  
  class Furniture implements Product {
    public function dimension($size,$weight,$height,$width,$length) {
      $_POST['size'] = NULL;
         $_POST['weight'] = NULL;
    }
  }
  
  class DVD implements Product {
    public function dimension($size,$weight,$height,$width,$length) {
      $_POST['weight'] = NULL;
         $_POST['height'] = NULL;
         $_POST['width'] = NULL;
         $_POST['length'] = NULL; 
    }
  }
  

include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{



$ProductType = new $_POST['type']();
$ProductType->dimension($_POST['size'],$_POST['weight'],$_POST['height'],$_POST['width'],$_POST['length']);

   $sku = $_POST['sku'];
   $name = $_POST['name'];
   $price = $_POST['price'];
   $type = $_POST['type'];
   $size = $_POST['size'];
   $weight = $_POST['weight'];
   $height = $_POST['height'];
   $width = $_POST['width'];
   $length = $_POST['length']; 

  
  
}
      //  addProduct;
     
      class InsertProduct extends Dbcon {

       public function setProduct($sku,$name,$price,$type,$size,$weight,$height,$width,$length){
          
          
         $sql = "INSERT INTO products (sku,name,price,type,size,weight,height,width,length) 
         VALUES (:sku,:name,:price,:type,:size,:weight,:height,:width,:length)";
              $stmt = $this->connect()->prepare($sql);
              $stmt->execute([
                  ':sku' => $sku,
                  ':name' => $name,
                  ':price' =>  $price,
                  ':type' =>  $type,
                  ':size' =>  $size,
                  ':weight' =>  $weight,
                  ':height' => $height,
                  ':width' =>  $width,
                  ':length' =>  $length]);
         
       }
     
         }
    // addProductContr;
  
    class ProductContr extends InsertProduct{

     private   $sku ;
     private   $name ;
     private   $price;
     private   $type ;
     private   $size ;
     private   $weight;
     private   $height;
     private   $width;
     private   $length;
     
     
       public function __construct($sku,$name,$price,$type,$size,$weight,$height,$width,$length) {
        
           $this->sku = $sku;
           $this->name = $name;
           $this->price = $price;
           $this->type = $type;
           $this->size = $size;
           $this->weight = $weight;
           $this->height = $height;
           $this->width = $width;
           $this->length = $length;
       }
   
       Public function Product() {

            $this->setProduct( $this->sku, $this->name,$this->price, $this->type,$this->size,$this->weight,$this->height,$this->width,$this->length);
       } 
     

      
     }

     $add = new ProductContr($sku,$name,$price,$type,$size,$weight,$height,$width,$length);
     $add->Product();
    
    
    // header("location: index.php");
   
  

  
   
?>


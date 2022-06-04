<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {

    if($_POST['type'] == 'Furniture'){
      $_POST['size'] = NULL;
      $_POST['weight'] = NULL;

    }elseif($_POST['type'] == 'DVD'){
      $_POST['weight'] = NULL;
      $_POST['height'] = NULL;
      $_POST['width'] = NULL;
      $_POST['length'] = NULL; 
    }else{
      $_POST['size'] = NULL;
      $_POST['height'] = NULL;
      $_POST['width'] = NULL;
      $_POST['length'] = NULL; 
    }
       $sku = $_POST['sku'];
       $name = $_POST['name'];
       $price = $_POST['price'];
       $type = $_POST['type'];
       $size = $_POST['size'];
       $weight = $_POST['weight'];
       $height = $_POST['height'];
       $width = $_POST['width'];
       $length = $_POST['length']; 

       include 'dbcon.php';
       //  addProduct;
       class AddProduct extends Dbcon {

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
   
     class AddProductContr extends AddProduct{

      private   $sku ;
      private   $name ;
      private   $price;
      private   $type ;
      private   $size ;
      private   $weight;
      private   $height;
      private   $width;
      private   $length;
      public $errSku;
      
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
           if($this->skuTaken() == false)
           {
            echo "Sku is taken. Try another one";
            header("location: addProduct.php");
             exit();
           }

             $this->setProduct( $this->sku, $this->name,$this->price, $this->type,$this->size,$this->weight,$this->height,$this->width,$this->length);
        }    
        public function checkSku($sku)
        {
            $sql = "SELECT sku FROM products WHERE sku = ?" ;
            $stmt = $this->connect()->prepare($sql);
            if(!$stmt->execute(array($sku))) 
            {
              $stmt = null;
            }
            $resultCheck;
            
            if($stmt->rowCount() > 0)
            {
              $resultCheck = false;
            }
            else
            {
              $resultCheck = true;
            }
            return $resultCheck;
        }
       
        function skuTaken()
          {
            $result;
            if(!$this->checkSku($this->sku))
            {
              $result = false;
          
            }
            else
            {
              $result = true;
            }
            return $result;
          }
      }
$add = new AddProductContr($sku,$name,$price,$type,$size,$weight,$height,$width,$length);
$add->Product();
header("location: index.php");

   
    }

?>








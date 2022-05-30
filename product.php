<?php
include 'dbcon.php';

 class Product {

    public   $sku ;
    public   $name ;
    public   $price;
    public   $type ;
    public   $size ;
    public   $weight;
    public   $height;
    public   $width;
    public   $length;
    
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
    //abstract function getDimension();
  }
  
  class Furniture extends Product {
    public function getDimension() {
      echo 'Dimension:'.$this->height . 'x' .$this->weidth .'x'.$this->length.'x' ;
    }
  }
  class DVD extends Product {
    public function getDimension() {
        echo 'Size:'.$this->size;
    }
  }
  class Book extends Product {
    public function getDimension() {
        echo 'Size:'.$this->weight;
    }
  }

  $prop = new Furniture;
  echo  $prop->getDimension();

?>
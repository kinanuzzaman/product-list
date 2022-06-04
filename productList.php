<?php
// Interface definition
interface Product {
    public function dimension($size,$weight,$height,$width,$length);
  }
  
  // Class definitions
  class Book implements Product {
      private $weight;
    public function dimension($size,$weight,$height,$width,$length) {
        $this->weight = $weight;
      echo 'Weight:'.$this->weight.'KG';
    }
  }
  
  class Furniture implements Product {
    private   $height;
    private   $width;
    private   $length;
    
    public function dimension($size,$weight,$height,$width,$length) {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        echo 'Dimension:'.$this->height.'x'.$this->width.'x'.$this->length ;  
    }
  }
  
  class DVD implements Product {
    private   $size ;
    public function dimension($size,$weight,$height,$width,$length) {
        $this->size = $size;
        echo 'Size:'.$this->size.' MB';
    }
  }
  



include 'dbcon.php';
class ProductList extends Dbcon {
    public function getProducts() {
        $sql = "SELECT * FROM products";
      $stmt = $this->connect()->query($sql);   
while($row = $stmt->fetch()) {  
    ?>
    <div class="border col" >
          <input type="checkbox" class="delete-checkbox" name= "prod_del_id[]" value="<?= $row["id"];?>">
          <ul>
              <li><?php echo $row ['sku']; ?></li>
              <li><?php echo $row ['name']; ?></li>
              <li><?php echo '$'.$row ['price']; ?></li>
              <li><?php 
    $ProductType = new $row['type']();
    $ProductType->dimension($row['size'],$row['weight'],$row['height'],$row['width'],$row['length']);
    ?></li>
          </ul>
          </div>   
<?php
} 
    }
}

?>
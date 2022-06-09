<?php
include 'dbcon.php';

class CheckSku extends Dbcon{
   private $sku;
    public function skuCheck($sku)
    {
        $this->sku = $sku;
        $sql = "SELECT sku FROM products WHERE sku = ?" ;
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($this->sku))) 
        {
          $stmt = null;
        }
       
      echo  $stmt->rowCount();
}  
}
if(isset($_POST['sku'])){
    $sku = $_POST['sku'];
    $check = new CheckSku;
$check->skuCheck($sku);
   
}
?>
<?php
include 'dbcon.php';

class CheckSku extends Dbcon{
   
    public function checkSku($sku)
    {
        $sql = "SELECT sku FROM products WHERE sku = ?" ;
        $stmt = $this->connect()->prepare($sql);
        if(!$stmt->execute(array($sku))) 
        {
          $stmt = null;
        }
       
      $resultCheck = $stmt->rowCount();
    //     if( $stmt->rowCount()> 0)
    //     {
    //       $resultCheck = false;
    //     // var_dump($resultCheck) ;
    //     }
    //     else
    //     {
    //       $resultCheck = true;
         
    //     }
        echo $resultCheck;
    
}  
}
if(isset($_POST['sku'])){
    $sku = $_POST['sku'];
    $check = new CheckSku;
    $check->checkSku($sku);
}
?>
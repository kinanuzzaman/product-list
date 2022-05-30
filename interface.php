
<?php
// Interface definition
interface Product {
  public function dimension();
}

// Class definitions
class Book implements Product {
  public function dimension() {
    echo " hi ";
  }
}

class Furniture implements Product {
  public function dimension() {
    echo " Bark ";
  }
}

class DVD implements Product {
  public function dimension() {
    echo " Squeak ";
  }
}

// class Display {
//     public function show(Product $productType){
//         $productType->dimension();
//     }
// }

// Create a list of Products
// $ProductType = new Book();
// $dispay = new Display();
// $ProductType->dimension($ProductType);

  



include 'dbcon.php';
class ProductList extends Dbcon {

    public $book;
    public function getProducts() {
        $sql = "SELECT * FROM products";
      $stmt = $this->connect()->query($sql);   
while($row = $stmt->fetch()) { 
    

    
    $ProductType = new $row['type']();
    // $dispay = new Display();
    $ProductType->dimension();
    

}
    }

    
   
        }

        
           
          
        $n = new ProductList;
    $n->getProducts();
    
        // $ProductType = new ;
        // $dispay = new Display();
        // $ProductType->dimension($ProductType);
?>
 

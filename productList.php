<?php
include 'dbcon.php';
class ProductList extends Dbcon {

    public function getProducts() {
        $sql = "SELECT * FROM products";
      $stmt = $this->connect()->query($sql);
      
      
while($row = $stmt->fetch()) { ?>
    <!-- // echo $row ['sku'];
    // $row['name']; 
    // $row['price'];-->
    <div class="border w-25 d-flex p-2 m-1" >
          <input type="checkbox" class="delete-checkbox" name= "prod_del_id[]" value="<?= $row["id"];?>">
          <ul>
              <li><?php echo $row ['sku']; ?></li>
              <li><?php echo $row ['name']; ?></li>
              <li><?php echo $row ['price']; ?></li>
              <li><?php echo $row ['type']; ?></li>
          </ul>
          </div>
<?php } 


// $stmt = $this->connect()->prepare($sql);
// $stmt->execute([])

    }
}
?>
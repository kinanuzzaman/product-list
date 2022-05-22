<?php
include 'dbcon.php';
class ProductList extends Dbcon {

    public function getProducts() {
        $sql = "SELECT * FROM products";
        $stmt = $this->connect()->query($sql);
while($row = $stmt->fetch()) {
    echo $row ['sku'] . '<br>';
}
    }
}
?>
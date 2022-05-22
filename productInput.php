<?php
include 'dbcon.php';

if(isset($_POST["submit"]))
{
    $sku = $_POST['sku'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $length = $_POST['length'];
   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    $sql="INSERT INTO `products` (`sku`,`name`,`price`,`type`,`size`,`weight`,`height`,`width`,`length`) 
    VALUES ('$sku','$name','$price','$type','$size','$weight','$height','$width','$length')";
    
    $result=mysqli_query($conn,$sql);
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

}
    
?>
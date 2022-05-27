<?php
include 'dbcon.php';

$dbc = new Dbcon();
$dbc->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
   {
    $allId = $_POST['prod_del_id'];

    $extractId = implode(',',$allId);

    echo $extractId;
  
    $sql = "DELETE FROM products WHERE id IN ($extractId)";
    $stmt = $dbc->connect()->query($sql);
   
    
        header("location: index.php");
    
   }

?>
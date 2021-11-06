<?php
require_once("connection.php");

if (isset($_POST['update']))
{
    $productID = $_GET['ID'];
    $itemNum = $_POST['itemNumber'];
   $itemCategory = $_POST['itemCategory'];
   $itemName = $_POST['itemName'];
   $stock = $_POST['stock'];
   $unit_Price = $_POST['unitPrice'];
   $unit_Price1 = $_POST['unitPrice1'];

 
    $query = " update item set `itemNumber` = '".$itemNum."',`itemCategory` = '".$itemCategory."',`itemName` = '".$itemName."',`stock` = '".$stock."',`unitPrice` = '".$unit_Price."',`unitPrice1` = '".$unit_Price1."' where `productID`='".$productID."'";
    $result = mysqli_query($con,$query);


    if($result)
    {
        header("location:item.php");
    }
    else
    {
      
        echo 'error';
    }
}



?>
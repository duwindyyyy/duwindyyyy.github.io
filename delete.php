<?php 
   require_once("connection.php");

if(isset($_GET['Del']))
         {
             $productID = $_GET['Del'];
             $query = " delete from item where productID = '".$productID."'";
             $result = mysqli_query($con,$query);
             if($result)
             {
                 header("location:item.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
         else
         {
             header("location:view.php");
         }
         

 


?>

<?php

    require_once("connection.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['itemNum'])|| empty($_POST['itemCategory']) || empty($_POST['itemName']) || empty($_POST['stock']) || empty($_POST['unitPrice'])|| empty($_POST['unitPrice1']))
        {
            echo ' Please Fill in the Blanks ';
        }
        else
        {
            $prodID = $_POST['prodID'];
            $itemNum = $_POST['itemNum'];
            $itemCategory = $_POST['itemCategory'];
            $itemName = $_POST['itemName'];
            $stck = $_POST['stock'];
            $unit_Price = $_POST['unitPrice'];
            $unit_Price1 = $_POST['unitPrice1'];
           

            $query = " insert into item (productID ,itemNumber, itemCategory,itemName, stock, unitPrice, unitPrice1) values('$prodID','$itemNum','$itemCategory','$itemName' ,'$stck','$unit_Price','$unit_Price1')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:item.php");
            }
            else
            {
                echo '  Please Check Your Query ';
            }
        }
    }
    else
    {
        header("location:index.php");
    }


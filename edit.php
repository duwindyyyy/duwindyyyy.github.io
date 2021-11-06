
<?php

require_once("connection.php");
$productID =$_GET['GetID'];
$query = " select * from item where productID='".$productID."'";

$result = mysqli_query($con,$query);


while($row=mysqli_fetch_assoc($result))
{
    $productID = $row['productID'];
    $itemNum = $row['itemNumber'];
    $itemCategory = $row['itemCategory'];
    $itemName = $row['itemName'];
    $stock = $row['stock'];
    $unit_Price = $row['unitPrice'];
    $unit_Price1 = $row['unitPrice1'];

}

?>




                                  





<!DOCTYPE html>
<html lang="en">
    <head>
<link rel="stylesheet" href="home_design.css">
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>HIS Bulacan Corp.</h2>
        <ul>
            <li><a href="home.php">Dashboard</a></li>
            <li><a onclick="clickSingleA(this)" class="single active"  href="item.php">Items</a></li>
            <li><a href="sales.php">Sales</a></li>
            <li><a href="purchase.php"></i>Purchase</a></li>
            <li><a href="reports.php"></i>Reports</a></li>
            <li><a href="settings.php"></i>Settings</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">   
        <h1 style="text-align: left;">Records</h1>
        </div>
        <div class="info">
    <form action="update.php?ID=<?php echo $productID ?>" method="post">
    <fieldset>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="itemNumber" value="<?php echo $itemNum?>" placeholder="Enter product number" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <select  name="itemCategory" value=""  style="padding: 5px; width: 90%">
            <option value = "<?php echo $itemCategory?>"> <?php echo $itemCategory?></option>
            <option value= "CD"> Consumables and Disposable (CD) </option>
            <option value= "MD"> Medical devices (MD) </option>
            <option value= "MF"> Medical furnitures (MF) </option> </select>
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="text" name="itemName" value="<?php echo $itemName?>" placeholder="Product name" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="stock" value="<?php echo $stock?>" placeholder="Product stock" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="unitPrice" value="<?php echo $unit_Price?>" placeholder="Product retail" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="unitPrice1" value="<?php echo $unit_Price1?>" placeholder="Product price" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <button class="btn btn-primary" name="update">Update</button>
        </div>
    </fieldset>
</form>
</div>
        
<?php 
    require_once("connection.php");
    $query = " select * from item ";
    $result = mysqli_query($con,$query);

?>
        <div class="container" style="text-align: center;">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                            <td> Product ID </td>
                                <td> Item Number </td>
                                <td> Iteam Category </td>
                                <td> Item Name</td>
                                <td> Stock </td>
                                <td> Unit Price </td>
                                <td> Unit Price1 </td>
                                <td> Edit  </td>
                                <td> Delete </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $productID = $row['productID'];
                                        $itemNum = $row['itemNumber'];
                                        $itemCategory = $row['itemCategory'];
                                        $itemName = $row['itemName'];
                                        $stck = $row['stock'];
                                        $unit_Price = $row['unitPrice'];
                                        $unit_Price1 = $row['unitPrice1'];
                            ?>
                                <div>
                                    <tr>
                                        <td><?php echo $productID ?></td>
                                        <td><?php echo $itemNum ?></td>
                                        <td><?php echo $itemCategory ?></td>
                                        <td><?php echo $itemName ?></td>
                                        <td><?php echo $stock ?></td>
                                        <td><?php echo $unit_Price ?></td>
                                        <td><?php echo $unit_Price1 ?></td>
                                        <td><button><a href="edit.php?GetID=<?php echo $productID ?>">Edit</a></button></td>
                                        <td><button><a href="delete.php?Del=<?php echo $productID ?>">Delete</a></button></td>
                                    </tr>        
                                    </div>
                            <?php 
                                    }  
                            ?>                                                                      

                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
    


	
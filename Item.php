<?php
include "connection.php";

if(!isset($_SESSION['username'])){
    header('Location: index.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<link rel="stylesheet" href="home_design.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<Title>
    ITEMS
</title>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2><img src="logo.png" style="max-width:120px"class="img-responsive"></h2>
        <ul>
            <a class="single" href="home.php"><li>Dashboard</li></a>
            <a onclick="clickSingleA(this)" class="single active" href="item.php"><li>Items</li></a>
            <a class="single" href="vendor.php"><li>Vendor</li></a>
            <a class="single" href="reports.php"><li>Reports</li></a>
            <a class="single" href="settings.php"><li>Settings</li></a>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">   
       <h1 style="text-align: left;">Records</h1>
        </div>
        <div class="info">
    <form action="insert.php" method="post">
    <fieldset>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="itemNum" value="" placeholder="Enter product number" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <select  name="itemCategory"  style="padding: 5px; width: 90%">
            <option value = ""> --Select--</option>
            <option value= "CD"> Consumables and Disposable (CD) </option>
            <option value= "MD"> Medical devices (MD) </option>
            <option value= "MF"> Medical furnitures (MF) </option> </select>
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="text" name="itemName" value="" placeholder="Product name" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="stock" value="" placeholder="Product stock" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="unitPrice" value="" placeholder="Product raw price" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <input type="number" name="unitPrice1" value="" placeholder="Product sale price" style="padding: 5px; width: 90%">
        </div>
        <div style="padding: 10px; text-align: center;">
        <button class="btn btn-primary" name="submit">Submit</button>
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
                    <div class="table-wrapper">
                        <table class="fl-table">
                            <thead>
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
                                        $stock = $row['stock'];
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
    


	
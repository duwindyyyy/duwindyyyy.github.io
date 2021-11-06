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
</head>
<Title>
    SALES REPORT
</title>
<body>
<div class="wrapper">
    <div class="sidebar">
    <h2><img src="logo.png" style="max-width:120px"class="img-responsive"></h2>
        <ul>
            <a class="single" href="home.php"><li>Dashboard</li></a>
            <a class="single" href="item.php"><li>Items</li></a>
            <a class="single" href="vendor.php"><li>Vendor</li></a>
            <a onclick="clickSingleA(this)" class="single active" href="reports.php"><li>Reports</li></a>
            <a class="single" href="settings.php"><li>Settings</li></a>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">   
        <h1 style="text-align: left;">Reports</h1>
        </div>
        <div class="info">
        <div class="tab">
  <button class="active"  class="tablinks" onclick="document.location='reports.php'">Sales</button>
  <button class="tablinks" onclick="document.location='reports_purchase.php'">Purchase</button>
        </div>
        <script>

function clickSingleA(a)
{
items = document.querySelectorAll('.single.active');

if(items.length) 
{
items[0].className = 'single';
}

a.className = 'single active';
}
</script>

    <?php 
    require_once("connection.php");
    $query = " select * from sales ";
    $result = mysqli_query($con,$query);
    ?>
    
    
        <div class="table-wrapper">
            <table class="fl-table">
        <thead>
        <tr>
            <th>Receipt No.</th>
            <th>Customer Name</th>
            <th>Category</th>
            <th>Item Name</th>
            <th>Item Quality</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Due Date</th>
        </tr>
        </thead>

        <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $receipt = $row['receipt_no'];
                                        $customer = $row['customer_name'];
                                        $category = $row['category'];
                                        $name = $row['Item_name'];
                                        $quantity = $row['item_quantity'];
                                        $amount = $row['total_amount'];
                                        $status = $row['status'];
                                        $date = $row['due_date'];

                                        
                            ?>
                            
                                <div>
                                    <tr>
                                        <td><?php echo $receipt ?></td>
                                        <td><?php echo $customer ?></td>
                                        <td><?php echo $category ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $quantity ?></td>
                                        <td><?php echo $amount ?></td>
                                        <td><?php echo $status ?></td>
                                        <td><?php echo $date ?></td>
                                    </tr>        
                                    </div>
                            <?php 
                                    }  
                            ?>  
                            <form class="form-inline" method="post" action="pdf_sales.php" use target="_blank">
                            <button type="submit" class="button" name="btn_pdf">Generate PDF</button>
                            </form>
        <tbody>
    </table>
</div>
</body>
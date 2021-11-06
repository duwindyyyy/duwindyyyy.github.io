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
    PURCHASE REPORT
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
  <button onclick="document.location='reports.php'">Sales</button>
  <button class="active" onclick="document.location='reports_purchase.php'">Purchase</button>
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
    $query = " select * from purchase ";
    $result = mysqli_query($con,$query);
?>


        <div class="table-wrapper">
    <table class="fl-table">
        <thead>
          <tr>
            <th>Order No.</th>
            <th>Purchase date</th>
            <th>Supplier Name</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit price</th>
            <th>Total Price</th>
            <th>Terms of Payment</th>
        </tr>
        </thead>
  

        <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $order_no = $row['order_no'];
                                        $purchaseDate = $row['purchase_date'];
                                        $supplier = $row['supplier_name'];
                                        $prodName = $row['product_name'];
                                        $quantity = $row['quantity'];
                                        $unitPrice = $row['unit_price'];
                                        $totalPrice = $row['total_price'];
                                        $terms = $row['payment_term'];

                                        
                            ?>
                            
                                <div>
                                    <tr>
                                        <td><?php echo $order_no ?></td>
                                        <td><?php echo $purchaseDate ?></td>
                                        <td><?php echo $supplier ?></td>
                                        <td><?php echo $prodName ?></td>
                                        <td><?php echo $quantity ?></td>
                                        <td><?php echo $unitPrice ?></td>
                                        <td><?php echo $totalPrice ?></td>
                                        <td><?php echo $terms ?></td>
                                    </tr>        
                                    </div>
                            <?php 
                                    }  
                            ?>  
                            <form class="form-inline" method="post" action="pdf_purchase.php" use target="_blank"> 
                            <button type="submit" class="button" name="btn_pdf">Generate PDF</button>
                            </form>
        <tbody>
    </table>
</div>
</body>
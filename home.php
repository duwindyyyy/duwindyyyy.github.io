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
<Title>
    DASHBOARD
</title>
</head>
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2><img src="logo.png" style="max-width:120px"class="img-responsive"></h2>
        <ul>
            <a onclick="clickSingleA(this)" class="single active" href="home.php"><li>Dashboard</li></a>
            <a class="single" href="item.php"><li>Items</li></a>
            <a class="single" href="vendor.php"><li>Vendor</li></a>
            <a class="single" href="reports.php"><li>Reports</li></a>
            <a class="single" href="settings.php"><li>Settings</li></a>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">   
       <h1 style="text-align: left;">Welcome Admin</h1>
                <form method='post' action="">
            <input type="submit" class="button" value="Logout" name="but_logout">
                </form>
        </div>
        <div class="info">
          <div></div>
          <div></div>
          <div></div>
      </div>
    </div>
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

</body>
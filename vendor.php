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
    VENDOR
</title>
<body>
<div class="wrapper">
    <div class="sidebar">
    <h2><img src="logo.png" style="max-width:120px"class="img-responsive"></h2>
        <ul>
            <a class="single" href="home.php"><li>Dashboard</li></a>
            <a class="single" href="item.php"><li>Items</li></a>
            <a onclick="clickSingleA(this)" class="single active" href="vendor.php"><li>Vendor</li></a>
            <a class="single" href="reports.php"><li>Reports</li></a>
            <a class="single" href="settings.php"><li>Settings</li></a>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">   
        <h1 style="text-align: left;">Vendor</h1>
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
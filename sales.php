<?php
include "connection.php";

if(!isset($_SESSION['uname'])){
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
<body>
<div class="wrapper">
    <div class="sidebar">
        <h2>HIS Bulacan Corp.</h2>
        <ul>
            <li><a href="home.php">Dashboard</a></li>
            <li><a href="item.php">Items</a></li>
            <li><a onclick="clickSingleA(this)" class="single active" href="sales.php">Sales</a></li>
            <li><a href="purchase.php">Purchase</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="settings.php">Settings</a></li>
        </ul> 
    </div>
    <div class="main_content">
        <div class="header">   
        <h1 style="text-align: left;">Sales</h1>
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
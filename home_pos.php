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
<html>
    <head>
        <link href="pos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="top">
            <div id="top-left">
                <div id="logo">
                    <p id="company"><b>HIS Bulacan Corp</b></p>
                </div>

                <div id="searching">
                    <input type="search" id="search" placeholder="Search" >
                </div>
                <div id="transaction">
                    <p>TRANSACTION NO.</p>
                    <p>TRANSACTION DATE.</p>
                </div>
            </div>
            <div id="top-right">
                <select id="account">
                    <option>Cashier</option>
                    <option>Logout</option>
                </select>
            </div>
            <div class="logout">
            <form method='post' action="">
            <input type="submit" value="Logout" name="but_logout">
            </form>
            </div>
        </div>

        <div id="container">

            <div id="left-container">
                <table>
                    <tr>
                        <th>DESCRIPTION</th>
                        <th style="width: 5vw;">PRICE</th>
                        <th style="width: 5vw;">QTY</th>
                        <th style="width: 5vw;">DISCOUNT</th>
                        <th style="width: 5vw;">TOTAL</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                </table>
            </div>

            <div id="right-container">
                <img src="images/transaction_logo.png" id="transaction_logo"><button>NEW TRANSACTION</button><br>
                <img src="images/add_logo.png" id="add_logo"><button>ADD DISCOUNT</button><br>
                <img src="images/cart_logo.png" id="cart_logo"><button>SETTLE PAYMENT</button><br>
                <img src="images/sales_logo.png" id="sales_logo"><button>DAILY SALES</button><br>
                <img src="images/clear_logo.png" id="clear_logo"><button>CLEAR CART</button>
            </div>
        </div>
    

        <div id="bottom">

            <div id="datetime">
                <div id="time">
                    <p id="currenttime"></p>
                </div>
                <div id="date">
                    <p id="currentdate"></p>
                </div>
            </div>

            <div id="total">
                <p>SALES TOTAL:</p>
                <p>DISCOUNT</p>
                <p>VAT</p>
                <p>VATABLE</p>
            </div>

        </div>

        <script>
            var ct = new Date();
            var cd = new Date();
            document.getElementById("currenttime").innerHTML = ct.toLocaleTimeString();
            document.getElementById("currentdate").innerHTML = ct.toDateString();

        </script>

    </body>
</html>
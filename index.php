<?php
include "connection.php";


if(isset($_POST['but_submit']))
{
    $usernameee = $_POST['usernamee']; 
    $passworddd = $_POST['passwordd']; 

    $query = "SELECT * FROM user WHERE username='$usernameee' AND password='$passworddd'";
    $query_run = mysqli_query($con, $query);
    $roles = mysqli_fetch_array($query_run);

    if($roles['role'] == "Admin")
    {
        $_SESSION['username'] = $usernameee;
        header('Location: home.php');
    }
    else if($roles['role'] == "Cashier")
    {
        $_SESSION['username'] = $usernameee;
        header('Location: home_pos.php');
    }
    else
    {
        echo "Email / Password is Invalid";
        
    }
}
?>
<html>
    <head> 
        <title>HIS Bulacan Corporation Medical Supplies and Equipment Inventory System</title>
        <link href="style.css" rel="stylesheet" type="text/css" media="all">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <form method="post" action="index.php">
                <br>
                <div class="header">
               <b><h1>HIS Bulacan Corporation <br>(Medical Supplies and Equipment) <br>Inventory System</h1></b>
            </div>
                <br>
                <br>
                <br>
                <br>
                <div id="div_login">
                    <h1>Welcome!</h1>
                    <div>
                        <input type="text" class="textbox"  name="usernamee" placeholder="Username" />
                    </div>
                    <div>
                        <input type="password" class="textbox" name="passwordd" placeholder="Password"/>
                    </div>
                    <div class="button">
                        <input type="submit" value="Login" name="but_submit" id="but_submit" />

                    </div>
                </div>
            </form>
        </div>
    </body>
</html>


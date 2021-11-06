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
<?php
    $db_user = "root";
    $db_pass = "";
    $db_name = "ims";

    $db = new PDO('mysql:host=localhost;dbname=' .$db_name . ';charset=utf8', $db_user, $db_pass);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
    if(isset($_POST['sub']))
    {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $repassword = $_POST['repass'];
        $role = $_POST['role'];
        $name = $_POST['name'];

        if ($pass == $repassword){
            $SQL = "INSERT into user (name, username, password, role) VALUES (?,?,?,?)";
            $STSMTINSERT = $db->prepare($SQL);
            $result = $STSMTINSERT->execute([$name, $username, $pass, $role]);

            if($result){
                $alert = "<script>alert('Admin Added');</script>";
                echo $alert;
            // $_SESSION['success'] = "Admin Added";
                // header('Location: settings.php');
            }else{
                $alert = "<script>alert('Admin Not Added');</script>";
                echo $alert;
                //$_SESSION['status'] = "Admin not Added";
                    //header('Location: settings.php');
            }
        }else
        {
            $alert = "<script>alert('Password doesn't match');</script>";
                echo $alert;
            //$_SESSION['status'] = "Password doesn't match";
        // header('Location: settings.php');
                
        }
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
                    <li><a href="purchase.php">Purchase</a></li>
                    <li><a href="reports.php">Reports</a></li>
                    <li><a onclick="clickSingleA(this)" class="single active"  href="settings.php">Settings</a></li>
                </ul> 
            </div>
            <div class="main_content">
                <div class="header">   
                    <h1 style="text-align: left;">Settings</h1>
                    </div>
                    <div class="info">
                        <form action="settings.php" method="POST">
                            <h2 style="font-size:20px;">Change Password</h2>
                                <div class="row">
                                    <div class="col"style="padding-top:10px;font-size:15px;">
                                        <label for="Username">Username</label>
                                    </div>
                                    <div class="cols">
                                        <input type="text" id="username" name="username" style="width: 60%;padding: 5px;border: 1px solid #ccc;
                                        border-radius: 10px;resize: vertical;"required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col"style="font-size:25px;">
                                        <label for="password"  style="display: inline-block;">New Password</label>
                                    </div>
                                    <div class="cols">
                                        <input type="password" name="pass" required/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="font-size:25px;" >
                                        <label for="repass"  style="display: inline-block;">Re-Type New Password</label>
                                    </div>
                                    <div class="cols">
                                        <input type="password" id="repass" name="repass" required/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cols" style="font-size:25px;">
                                        <button name="sub" style="background-color: #04AA6D;color: white;padding: 12px 12px;border: none;border-radius: 4px;cursor: pointer;
                                        float: left;">Submit</button>
                                    </div>
                                </div>
                        </form>
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
</html>
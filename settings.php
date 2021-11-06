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
                $alert = "<script>alert('Account Created');</script>";
                echo $alert;
            // $_SESSION['success'] = "Admin Added";
                // header('Location: settings.php');
            }else{
                $alert = "<script>alert('Account Not Added');</script>";
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
    <Title>
    SETTINGS    
    </title>
    <body>
        <div class="wrapper">
            <div class="sidebar">
            <h2><img src="logo.png" style="max-width:120px"class="img-responsive"></h2>
                <ul>
                <a class="single" href="home.php"><li>Dashboard</li></a>
                <a class="single" href="item.php"><li>Items</li></a>
                <a class="single" href="vendor.php"><li>Vendor</li></a>
                <a class="single" href="reports.php"><li>Reports</li></a>
                <a onclick="clickSingleA(this)" class="single active" href="settings.php"><li>Settings</li></a>
                </ul> 
            </div>
            <div class="main_content">
                <div class="header">   
                    <h1 style="text-align: left;">Settings</h1>
                </div>
        <!--START NG CREATE ACC TO -->
            <div class="info">
                <table style="margin-left: auto; margin-right:auto;">
                    <th>
                        <table >
                            <div class="info"style="border: 1px solid black; border-radius: 5px; padding:30px">
                                <form action="settings.php" method="POST">
                                    <h2 style="font-size:20px;">CREATE ACCOUNT</h2>
                                        <div class="row">
                                            <div class="col"style="padding-top:10px;font-size:15px;">
                                                <label for="Username">Username</label>
                                            </div>
                                            <div class="cols">
                                                <input type="text" id="username" name="username" style="width: 6Opx;padding: 5px;border: 1px solid #ccc;
                                                border-radius: 10px;"required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col"style="font-size:15px;">
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="cols">
                                                <input type="password" name="pass" style="width: 6Opx;padding: 5px;border: 1px solid #ccc;
                                                border-radius: 10px;"required/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col"style="font-size:15px;">
                                                <label for="repass">Re-Type Password</label>
                                            </div>
                                            <div class="cols">
                                                <input type="password" id="repass" name="repass" style="width: 6Opx;padding: 5px;border: 1px solid #ccc;
                                                border-radius: 10px;"required/>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="role">Role</label>
                                            </div>
                                            <div class="cols">
                                                <select id="role" name="role">
                                                    <option value="Admin">Admin</option>
                                                    <option value="Cashier">Cashier</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col" style="font-size:15px;">
                                                <label for="name">Name</label>
                                            </div>
                                            <div class="cols">
                                                <input type="text" id="name" name="name" style="width: 6Opx;padding: 5px;border: 1px solid #ccc;
                                                border-radius: 10px;"required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cols" style="font-size:25px;">
                                            <button name="sub" style="background-color: #04AA6D;color: white;padding: 12px 12px;border: none;border-radius: 4px;cursor: pointer;">Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </table>
                    </th>
                    <!--FORGOT PASSWORD NA ITO-->
                    <th>
                        <table >
                            <div class="info"style="border: 1px solid black; border-radius: 5px; padding:30px">
                                <form action="settings.php" method="POST">
                                    <h2 style="font-size:20px;">Forgot Password</h2>
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
                                            <div class="col"style="padding-top:10px;font-size:15px;">
                                                <label for="password"  style="display: inline-block;">Old Password</label>
                                            </div>
                                            <div class="cols">
                                                <input type="password" name="oldPass" style="width: 60%;padding: 5px;border: 1px solid #ccc;
                                                border-radius: 10px;resize: vertical;"required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col"style="padding-top:10px;font-size:15px;">
                                                <label for="Newpass"  style="display: inline-block;">New Password</label>
                                            </div>
                                            <div class="cols">
                                                <input type="password" id="Newpass" name="Newpass" style="width: 60%;padding: 5px;border: 1px solid #ccc;
                                                border-radius: 10px;resize: vertical;"required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col"style="padding-top:10px;font-size:15px;">
                                                <label for="repass"  style="display: inline-block;">Re-Type New Password</label>
                                            </div>
                                            <div class="cols">
                                                <input type="password" id="repass" name="repass" style="width: 60%;padding: 5px;border: 1px solid #ccc;
                                                border-radius: 10px;resize: vertical;"required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="cols" style="font-size:25px;">
                                            <button name="sub" style="background-color: #04AA6D;color: white;padding: 12px 12px;border: none;border-radius: 4px;cursor: pointer;">Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </table>
                    </th>
                    <!--END NG PASSWORD-->
                </table>
            </div>
            </div>
        <!--END NG CREATE AND FORGOT PASSWORD-->
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
<?php
    require("config.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/style1.css">
    <meta http-equiv="X-UA-Compatible" content="IE  =edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corona Management (Hospital_Login_Page)</title>
</head>

<body>
<?php include("../components/header.php"); ?>
    <div class="text">
        
        <h1>Hospital Login</h1>
        
    </div>
    <br><br>
        <div class="register_form">
            <br><br>
            <form style="margin: auto; padding: 10px" method="POST">
                <div class="input_field">
                    <label>Username:</label>
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <br><br>
                <div class="input_field">
                    <label>Password:</label>
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <br><br>
                <button class="login_button" name="Login">Login</button>
            </form>
            <br><br>
        </div>

</body>

<?php
if(isset($_POST['Login']))
{
    $query="SELECT * FROM `hospital` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['username']=$_POST['username'];
    }
    else
    {
        echo "<script> alert('Incorrect Username/Password')</script>";
    }
}
?>

</html>
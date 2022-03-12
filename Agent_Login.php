<?php
    require("config.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta http-equiv="X-UA-Compatible" content="IE  =edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corona Management (Agent_Login_Page)</title>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="Visitor_Register.php">Visitors Registeration</a></li>
            <li><a href="Place_Owner_Register.php">Place Owner's Register Registeration</a></li>
            <li><a href="Agent_Login.php">Agent's Login</a></li>
            <li><a href="Hospital_Login.php">Hospital Login</a></li>
        </ul>
    </div>
    <div class="text">
        <hr>
        <h1>Agent Login</h1>
        <hr>
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
    $query="SELECT * FROM `agent` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['username']=$_POST['username'];
        header('Location: Testingdata.php');
    }
    else
    {
        echo "<script>alert('Incorrect Username/Password')</script>";
    }
}
?>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corona Management (Visitor_Registeration_Page)</title>
</head>
<body>
<?php include("../components/header.php"); ?>
    <div class="text">
    
        <h1>Visitors Registeration</h1>
        
            <h1>New here? Register right now!</h1>

        
        <div class="register_form">
            <br><br>
            <form style="margin: auto; padding: 10px" method="POST">
                <div class="input_field">
                    <label>Name:</label>
                    <input type="text" placeholder="Name" name="Name" required>
                </div>
                <br><br>
                <div class="input_field">
                    <label>Address:</label>
                    <input type="text" placeholder="Address" name="Address" required>
                </div>
                <br><br>
                <div class="input_field">
                    <label>City:</label>
                    <input type="text" placeholder="City" name="City" required>
                </div>
                <br><br>
                <h1 class="require">Please Fill in either your Contact-Number/Email or both!</h1>
                <div class="input_field">
                    <label>Contact-Number:</label>
                    <input type="number" placeholder="Contact-Number" name="Phone" required >
                </div>

                <br><br>
                <div class="input_field">
                    <label>Email-Address:</label>
                    <input type="email" placeholder="Email-Address" name="Email" required>
                </div>
                <br><br>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                      const inputs = Array.from(
                        document.querySelectorAll('input[name=Phone], input[name=Email]')
                      );
                    
                      const inputListener = e => {
                        inputs
                          .filter(i => i !== e.target)
                          .forEach(i => (i.required = !e.target.value.length));
                      };
                    
                      inputs.forEach(i => i.addEventListener('input', inputListener));
                    });
                </script>
                
                <button class="register_button" name="Register">Register</button>
            </form>
            <br><br>
        </div>
    </div>
    
<?php
if (isset($_POST['Register'])) {
    include('config.php');
    $visitor_name = $_POST['Name'];
    $address = $_POST['Address'];
    $city = $_POST['City'];
    $phone_number = $_POST['Phone'];
    $email = $_POST['Email'];
    $query = "INSERT INTO visitor (`visitor_name`, `address`,`city`,`phone_number`,`email`) VALUES ('$visitor_name', '$address', '$city', '$phone_number', '$email')"; 
        if (mysqli_query($conn, $query)) {
                echo "Success";
            } else {
                echo "Failure";
            }
        }
?>

    
</body>
</html>
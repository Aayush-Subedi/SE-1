<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corona Management (Place_Owners_Registeration_Page)</title>
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
        <h1>Place Owner's Registeration</h1>
        <hr>
        <h1>Register here to obtain your QR code right away!</h1>
        <div class="register_form">
            <br><br>
            <form style="margin: auto; padding: 10px" method="POST">
                <div class="input_field">
                    <label>Place Name:</label>
                    <input type="text" placeholder="Name" name="place_name" required>
                </div>
                <br><br>
                <div class="input_field">
                    <label>Address:</label>
                    <input type="text" placeholder="Address" name="Address" required>
                </div>
                <br><br>
                <h1 class="require">Please Fill in either your Contact-Number/Email or both!</h1>
                <div class="input_field">
                    <label>Contact-Number:</label>
                    <input type="number" placeholder="Contact-Number" name="Phone" required>
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
        $place_name = $_POST['place_name'];
        $address = $_POST['Address'];
        $phone_number = $_POST['Phone'];
        $email = $_POST['Email'];
        $query = "INSERT INTO places (`place_name`, `address`,`phone`,`email`) VALUES ('$place_name', '$address', '$phone_number', '$email')";
        if (mysqli_query($conn, $query)) {
            echo "Success";
        } else {
            echo "Failure";
        }
    }
    ?>


</body>

</html>
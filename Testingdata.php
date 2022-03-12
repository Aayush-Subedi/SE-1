<?php
    require("config.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $query = "SELECT * FROM visitor;";
        $result = mysqli_query($conn, $query);
        $resultC = mysqli_num_rows($result);
        if($resultC > 0) {
            echo "<h1 style='color:black;'>Visitors information:</h1>";
            while ($row = mysqli_fetch_assoc($result)){
                echo "
                <table style='border-collapse:seperate; border-spacing: 50px; border: 1px solid black;text-align:center;'>
                    <tr style='color:blacks;font-size:30px;text-align:center;'>
                        <th><p>citizen_id</th></p>
                        <th><p>Visitor Name</th></p>
                        <th><p>Address</th></p>
                        <th><p>City</th></p>
                        <th><p>Phone Number</th></p>
                        <th><p>Email</th></p>
                        <th><p>Device ID</th></p>
                        <th><p>Infected?</th></p>

                    </tr>
                    <tr style='color:black;font-size:25px;text-align:center;'>
                        <td>".$row['citizen_id'] . "</td>
                        <td>".$row['visitor_name'] ."</td>
                        <td>".$row['address'] ."</td>
                        <td>".$row['city'] ."</td>
                        <td>".$row['phone_number'] ."</td>
                        <td>".$row['email'] ."</td>
                        <td>".$row['device_id'] ."</td>
                        <td>".$row['infected'] ."</td>
                    </tr>
                </table>";
            }
        }
    ?>
</body>
</html>
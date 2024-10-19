<?php
include("../database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $id = $_POST['username'];
    $pass = $_POST['password'];

    
    if (!empty($id) && !empty($pass)) {
       
        $stmt = $cn->prepare("INSERT INTO mst_admin (loginid, pass) VALUES (?, ?)");

        if ($stmt) {
           
            $stmt->bind_param("ss", $id, $pass);

            if ($stmt->execute()) {
                echo "Recorded successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

      
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $cn->error;
        }
    } else {
        echo "Username or Password cannot be empty.";
    }

    mysqli_close($cn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form action="signup.php" method="post">
        <input id="username" name="username" type="text" placeholder="username">
        <br>
        <input id="password" name="password" type="text" placeholder="password">
        <br>
        <input type="submit">
    </form>



</body>

</html>
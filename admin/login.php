<?php
session_start();
error_reporting(1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Administrative Area Online Quiz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link href="../quiz.css" rel="stylesheet" type="text/css">
</head>

<body>

    <?php
    include("header.php");
    include("../database.php");
    session_start();
    error_reporting(1);
    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
    
    <head>
        <title>Administrative Area Online Quiz</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="../quiz.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
    
        <?php
        include("header.php");
        include("../database.php");
    
   
        
        // Display the login form
        echo '<form action="login.php" method="post">
            <input id="username" name="username" type="text" placeholder="username" required>
            <br>
            <input id="password" name="password" type="password" placeholder="password" required>
            <br>
            <input type="submit" name="submit" value="Login">
        </form>';
    
        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            $loginid = $_POST['username'];
            $pass = $_POST['password'];
    
            // Prepared statement to prevent SQL injection
            $stmt = $cn->prepare("SELECT * FROM mst_admin WHERE loginid=? AND pass=?");
            $stmt->bind_param("ss", $loginid, $pass);
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Check if the user exists
            if ($result->num_rows < 1) {
                echo "<BR><BR><BR><BR><div class='head1'> Invalid User Name or Password</div>";
                exit;
            } else {
                $_SESSION['alogin'] = "true";  // Correctly set session variable
                echo "<button><a href='logedin.php'>GO to Loged in page</a></button>";
            }
    
        } else if (!isset($_SESSION['alogin'])) {  // Check if the user is logged in
            echo "<BR><BR><BR><BR><div class='head1'> You are not logged in<br> Please <a href='index.php'>Login</a></div>";
            exit;
        }
    
    ?>

</body>

</html>
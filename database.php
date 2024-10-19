<?php
$host = "localhost";
$username = "root";
$password = "Shubham@22sh";
$database = "exam_portal";

$cn = new mysqli($host,$username,$password,$database);

if($cn->connect_error){
    die("Connection Failed: " . $cn->connect_error);
}

// $cn=mysql_connect("localhost","root","MihirK@19!","mysql") or die("Could not Connect My Sql");
// mysql_select_db("quiz",$cn)  or die("Could connect to Database");
?>

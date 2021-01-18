<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini projet";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
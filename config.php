
<?php
$host = "localhost";
$user = "root"; // change if needed
$pass = "";     // change if needed
$db   = "blog";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();
?>

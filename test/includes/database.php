<?php
class Database {
    private $servername     = '0.0.0.0';
    private $uname          = 'woorden';
    private $passw          = 'buzword';
}
// Raspberry pi connection
// $servername = "0.0.0.0";
// $username = "woorden";
// $password = "buzword";
// PC LOCAL
$servername = "localhost";
$username = "root";
$password = "";
// DB NAME = SAME
$db = "tictacboom";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>
<?php

// Raspberry pi connection

// $servername = "0.0.0.0";
// $username = "woorden";
// $password = "buzword";
// $db = "tictacboom";


// local connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "tictacboom";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
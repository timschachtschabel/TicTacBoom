<?php
require '../database.php';
$db = new Database();

if ($_POST) {
    $names = $db->select("users", "name");
    
    echo json_encode($names);
}    

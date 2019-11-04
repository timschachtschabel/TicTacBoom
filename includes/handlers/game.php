<?php
require '../database.php';
$db = new Database();
if (!$_POST) {
    $result = $db->select("game", "state");
    if ($result[1]["state"]) {
        $result = ["type" => "success", "message" => "Het spel is gestart", "color" => "grnp", "state" => true];
    } else {
        $result = ["type" => "warning", "message" => "Het spel is gestopt", "color" => "yelp", "state" => false];
    }
} else {
    
}
echo json_encode($result);
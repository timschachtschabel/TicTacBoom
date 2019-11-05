<?php
require 'database.php';
$db = new Database();

/*
@ CREATE:   $db->insert($table, $params = []);
@ READ:     $db->select($table, $rows = '*', $clause);
@ UPDATE:   $db->update($table,$params=[],$clause);
@ DELETE:   $db->delete($table,$clause = null);
*/


if ($db->state()["connected"]) {
    $return = ["type" => "error", "message" => "No posts received"];
    if (isset($_POST['naam'])) {
        $return = $db->select("users", "naam", "naam = '".$_POST['naam']."'");
    }
    echo json_encode($return);
} else {
    echo $db->state()["description"];
}
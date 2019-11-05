<?php
require '../database.php';
$db = new Database();
session_start();
if ($_POST) {
    if (isset($_POST['logout'])) {
        $res = ["logout" => $_POST['logout']];
        if (session_destroy()){
            $res = ["type" => "success", "message" => "Uitloggen gelukt!"];
        } else {
            $res = ["type" => "error", "message" => "Mislukt om uit te loggen..."];
        }
        //! NO PARAMETERS OR WRONG PARAMETERS
    } else {
        $res = ["type" => "error", "message" => "Verkeerde parameters"];
    }
    //! NO POST METHOD USED
} else {
    $res = ["type" => "error", "message" => "Niks ontvangen"];
}
echo json_encode($res);
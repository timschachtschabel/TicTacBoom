<?php
require '../database.php';
$db = new Database();
session_start();
if ($_POST) {
    //> CHECK IF NAME IS POSTED
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        //> CHECK IF NAME EMPTY
        if (empty($name)) {
            $res = ["type" => "error", "message" => "Vul een naam in"];
        } else {
            //> NAAM MOET MINSTENS 3 KARAKTERS BEVATTEN
            if (strlen($name) < 3) {
                $res = ["type" => "warning", "message" => "Minstens 3 letter"];
            } else {
                //@ NAME NOT EMPTY AND NO ERRORS
                $res = $db->select("users");
                //> CHECK IF TABLE EMPTY
                if (!$res = $res[0]["results"]) {
                    //@ TABLE EMPTY SO FIRST ONE IS ADMIN
                    $_SESSION['sid'] = session_id();
                    $res = $db->insert("users", ["name" => $name, "isadmin" => 1, "sid" => $_SESSION['sid']]);
                    $res = ["type" => "success", "message" => "ADMIN RIGHTS!"];
                } else {
                    //? TABLE NOT EMPTY ADMIN ALREADY HERE
                    //> CHECK IF NAME EXISTS
                    $res = $db->select("users", "name", "name = '".$name."' AND sid = '".session_id()."'");
                    if ($res[0]["results"] > 0) {
                        //? NAME IS DUPLICATE
                        $res = ["type" => "warning", "message" => "Naam bestaat al"];
                    } else {
                        //@ NAME NOT DUPLOCATE BUT NOT FIRST IN GAME
                        $_SESSION['sid'] = session_id();
                        $res = $db->insert("users", ["name" => $name, "isadmin" => 0, "sid" => $_SESSION['sid']]);
                        $res = ["type" => "success", "message" => "Good luck!"];
                    }
                }
            }
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
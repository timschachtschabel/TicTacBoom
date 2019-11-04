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
    if (isset($_POST['cmd'])) {
        $return = ["type" => "error", "message" => "No posts received"];
        switch ($_POST['cmd']) {
            case "c":
            $return = $db->insert($_POST['table'], $_POST['args']);
            break;
            case "r":
            $return = $db->select($_POST['table'], (isset($_POST['cols']) ? $_POST['cols'] : "*"), $_POST['clause']);
            break;
            case "u":
            $return = $db->update($_POST['table'], $_POST['args'], $_POST['clause']);
            break;
            case "d":
            $return = $db->delete($_POST['table'], $_GET['clause']);
            break;
            default: break;
        }
    }
    echo json_encode($return);
} else {
    echo $db->state()["description"];
}




//-                   NOTHING                                    
// require 'database.php';

// class Controller {
//     /*
//     # ENABLE/DISABLE DEBUGGING
//     @ Debugging can be handy snapje */
//     private $DEBUGGING_ENABLED = true;
//     //> VARIABLES
//     private $db, $connected;
//     //> CONSTRUCT PROGRAM 
//     public function __construct() {
//         $this->db   = new Database();
//         $this->connected = $this->db->state()["connected"];
        
//         $this->dbg('<CONTROLLER HAS BEEN CONSTRUCTED>'); //DEBUG
//     }

//     //> GETTERS
//     public function connected() { return $this->connected; }


//     // DESTRUCTOR (runs at end of program)
//     public function __destruct(){
//         $this->db->disconnect();
//      }


//      //DEBUGGER
//      private function dbg($say, $warn = 'debug') {
//          if ($this->DEBUGGING_ENABLED) {
//              echo "<script>console.".$warn."('".$say."');</script>";
//          }
//      }
// }
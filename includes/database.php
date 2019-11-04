<?php
require 'config.php';
class Database {
    //> VARIABLES
    private $db, $host, $uname, $passw, $dbname, $conn, $state, $conf, $sid;
    //> CONSTRUCT PROGRAM 
    public function __construct() {
        // session_start();
        // $this->sid = session_id();
        $this->conf = new Configuration();
        $this->host     = $this->conf->DATABASE_HOST;
        $this->uname    = $this->conf->DATABASE_USER;
        $this->passw    = $this->conf->DATABASE_PASS;
        $this->dbname   = $this->conf->DATABASE_NAME;
        $this->db       = null;
        $this->conn     = false;
        $this->state    = $this->connect();
        //! Change to something spectaculair
        //echo 'The class "' . __CLASS__ . '" was constructed.<br>';
    }

    //> GETTERS
    public function state() { return $this->state; }
    public function cnt() { return $this->db; }
    
    /// Make connection
    private function connect() {
        $this->db = new mysqli($this->host, $this->uname, $this->passw, $this->dbname);
        if (!$this->db) {
            $this->conn = false;
            return ["connected" => false, "type" => "error", "message" => "Failed to connect.", "description" => mysqli_connect_error()];
        } else {
            $this->conn = true;
            $this->db->set_charset("utf8");
            $this->db->select_db($this->dbname);
            return ["connected" => true, "type" => "succes", "message" => "Connection successfully established",
                    "description" => "Connected to: ".$this->host."\n USER: ".$this->uname."\n DBNAME: ".$this->dbname];
        }
    }

    public function disconnect() {
        $this->db->close();
    }

    //@ FULL SQL QUERIES
    public function sql($sql) {
        if ($this->conn) {
            $result = mysqli_query($this->db, $sql);
           //??$result = $this->db->query($sql, MYSQLI_USE_RESULT);
            /// FOUND DATA
            if ($result->num_rows > 0) {
                $res = [['type' => 'success', "results" => $result->num_rows, 'message' => ($result->num_rows.' result'.(($result->num_rows>1) ? "s":"").' found')]];
                while ($row = $result->fetch_assoc()) { array_push($res, $row); }
                return $res;
            //! NO RESULTS
            } else {
                return ["type" => "error", "sid" => $this->sid, "results" => $result->num_rows, "message" => "No results found"];
            }
            $result->close();
        } else {
            return ["type" => "error", "message" => "Not connected to any database"];
        }
    }
    //@ CRUD FUNCTIONS
    /// CREATE
    public function insert($table, $params = []) {
        if ($this->tableExists($table)) {
            $cols = array_keys($params);
            $implodeCols = implode(',',$cols);
            $vals = array_values($params);
            $implodeVals = "'".implode("','",$vals)."'";
            $sql = "INSERT INTO ".$table." (".$implodeCols.") VALUES (".$implodeVals.")";
            $result = mysqli_query($this->db, $sql);
            //? TRYING TO INSERT
            if ($result) {
                return ["type" => "success", "message" => "Inserted (".$implodeVals.") VALUES in '".$table."'"];
            } else {
                $error = mysqli_error($this->db);
                if(strpos($error, "Duplicate entry") !== false) {
                    return ["type" => "duplicate", "message" => "Redundant information: ". $error, "description" => "Deze naam bestaat al"];
                } else {
                    return ["type" => "error", "message" => "Something went wrong, please check query: '".$sql."': ". $error, "description" => "Probeer opnieuw"];
                }
            }
            $result->close();
        } else {
            return ["type" => "error", "message" => "Table '".$table."' does not exist"];
        }
    }

    /// READ
    public function select($table, $rows = '*', $clause = null) {
        $sql = 'SELECT '.$rows.' FROM '.$table;
        if ($clause != null) { $sql .= " WHERE ".$clause; }
        if ($this->tableExists($table)) {
            /// DO QUERY
            $result = mysqli_query($this->db, $sql);
            if ($result->num_rows > 0) {
                $res = [["type" => "success", "sid" => $this->sid, "results" => $result->num_rows, "message" => ($result->num_rows." result".(($result->num_rows>1) ? "s":"")." found")]];
                while ($row = $result->fetch_assoc()) { array_push($res, $row); }
                return $res;
            //! NO RESULTS
            } else {
                $error = mysqli_error($this->db);
                return ["type" => "error", "results" => $result->num_rows, "message" => "No results found in '".$table."'| ".$error];
            }
            $result->close();
        } else {
            return ["type" => "error", "message" => "Table '".$table."' does not exist"];
        }
    }

    /// UPDATE
    public function update($table, $params=[], $clause) {
        if($this->tableExists($table)){
            $args = [];
            foreach($params as $field=>$value) { $args[]=$field."='".$value."'"; }
            $sql = 'UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$clause;
            $result = mysqli_query($this->db, $sql);
            if ($result) {
                return ["type" => "success", "message" => "Updated (".implode(',', $args).") in '".$table."'"];
            } else {
                $error = mysqli_error($this->db);
                return ["type" => "error", "message" => "Something went wrong, please check query: '".$sql."': ". $error, "query" => $sql];
            }
            $result->close();
        } else {
            return ["type" => "error", "message" => "Table '".$table."' does not exist"];
        }
    }

    /// DELETE
    public function delete($table, $clause = null) {
        if ($this->tableExists($table)) {
            $delete = "";
            if($clause != null) { $delete = 'DELETE FROM '.$table.' WHERE '.$clause; } 
            else { $delete = 'DROP TABLE '.$table; }
            $result = mysqli_query($this->db, $delete);
            if ($result) {
                if ($clause == null) {
                    return ["type" => "success", "message" => "Successfully deleted '".$table."'"];
                } else {
                    return ["type" => "success", "message" => "Successfully deleted '".$clause." FROM '".$table."'"];
                }
            } else {
                $error = mysqli_error($this->db);
                return ["type" => "error", "message" => "Something went wrong: ".$error];
            }
            $result->close();
        } else {
            return ["type" => "error", "message" => "Table '".$table."' does not exist"];
        }
    }

    //@ OTHER PUBLIC FUNCS
    public function getCats() {
        //  SHOW TABLES FROM shauwki_tictacboom LIKE 'cat_%'
        $sql = "SHOW TABLES FROM ".$this->db." LIKE 'cat_%'";
        $result = $this->sql($sql);
        if ($result[0]["results"] > 0) {
            return $result;
        } else {
            return [["type" => "error", "message" => "No categories found"]];
        }
    }

    //@ Private function to check if table exists for use with queries
	private function tableExists($table){
        $sql = "SHOW TABLES FROM ".$this->dbname." LIKE '".$table."'";
        $result = mysqli_query($this->db, $sql);
        if ($result->num_rows >= 1) {
            return true;
        } else {
            return false;
        }
    }

    //- DESTRUCTOR (runs at end of program)
    // public function __destruct(){
    //    //TODO Change to something spectaculair
    //    $this->disconnect();
    // //    echo 'The class "' . __CLASS__ . '" was destroyed.<br>';
    // }
}
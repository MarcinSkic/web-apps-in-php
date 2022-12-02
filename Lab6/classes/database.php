<?php
class Database {
    private $mysqli;
    public function __construct($server, $user, $pass, $table)
    {
        $this->mysqli = new mysqli($server,$user,$pass,$table);
        if($this->mysqli->connect_errno){
            printf("Nie udało się połączenie z serwerem: %s\n",$this->mysqli->connect_error);
            exit();
        }
        if ($this->mysqli->set_charset("utf8")) {
            //udało sie zmienić kodowanie
        } else {
            printf("Failed utf8 change");
            exit();
        }
    }

    function __destruct() {
        $this->mysqli->close();
    }

    public function select($sql, $fields) {
        $text = "";
        if ($queryResult = $this->mysqli->query($sql)) {
            $fieldsAmount = count($fields);
            $rowsAmount = $queryResult->num_rows;

            $text.="<table><tbody>";
            while ($queryRow = $queryResult->fetch_object()) {
                $text.="<tr>";
                for ($i = 0; $i < $fieldsAmount; $i++) {
                    $p = $fields[$i];
                    $text.="<td>" . $queryRow->$p . "</td>";
                }
                $text.="</tr>";
            }
            $text.="</table></tbody>";
            $queryResult->close();
        }

        return $text;
    }

    public function insert($sql) {
        if( $this->mysqli->query($sql)) return true; else return false;
    }

    public function getMysqli() {
        return $this->mysqli;
    }
}
?>
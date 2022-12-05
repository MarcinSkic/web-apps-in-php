<?php
class Database {
    private $mysqli;
    public function __construct($servers, $user, $pass, $table)
    {
        $connected = false;
        $connectionErrors = "Nie udało się połączenie z serwerami:\n";
        foreach($servers as $server){
            try{
                $this->mysqli = new mysqli($server,$user,$pass,$table);
            } catch(mysqli_sql_exception $e){
                $connectionErrors .= "Nieudane połączenie $server\n".$e;
                continue;
            }
            
            $connected = true;
            break;
        }

        if(!$connected){
            $connectionErrors = preg_replace("/$pass/","*******",$connectionErrors);
            echo nl2br($connectionErrors);
            exit();
        }

        if($this->mysqli->connect_errno){
            printf("Nie udało się połączenie z serwerem: $server%s\n".$this->mysqli->connect_error);
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
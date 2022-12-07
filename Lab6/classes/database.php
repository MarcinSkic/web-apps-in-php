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
            echo "Nie udało się połączenie z serwerem: $server\n".$this->mysqli->connect_error;
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

    public function getSelectArray(string $sql){
        if($queryResult = $this->mysqli->query($sql)){
            return $queryResult->fetch_all(MYSQLI_ASSOC);
        }
        return false;
    }

    public function select($sql, $fields) {
        $text = "";
        if ($queryResult = $this->mysqli->query($sql)) {
            $fieldsAmount = count($fields);
            $rowsAmount = $queryResult->num_rows;

            //$queryResult->
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

    /**
     * Method for executing any sql command on database
     * 
     * @param string $sql SQL command
     * 
     * @return mixed Result of command or feedback if everything worked
     */
    public function executeSQL(string $sql) {
        return $this->mysqli->query($sql);
    }

    public function getMysqli() {
        return $this->mysqli;
    }
}
?>
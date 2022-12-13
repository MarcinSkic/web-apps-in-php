<?php
class User {
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;
    protected $status;
    protected $userName;
    protected $fullName;
    protected $email;
    protected $passwd;
    protected $date;

    function __construct($userName, $fullName, $email, $passwd ){

        $this->status=User::STATUS_USER;
        $this->userName = $userName;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->passwd = password_hash($passwd,PASSWORD_BCRYPT);
        $this->date = new DateTime('now');
        $this->date = date("Y-m-d");
    }

    public function saveToDB($db){
        $sql = "insert into users values (NULL,'".$this->userName."','".$this->fullName."','".
                    $this->email."','".$this->passwd."','".$this->status."','".$this->date."');";
        if(!$db->executeSQL($sql)){
            if($db->getSelectArray("select * from users where userName regexp '".$this->userName."' and email regexp '".$this->email."'")){
                echo "Użytkownik o takim nicku i mailu już istnieje!";
            } else {
                echo "Nieudane wykonanie SQL:</br>";
                echo $sql;
            }
            return false;
        }
        return true;
    }

    public static function getAllUsersFromDB(Database $db){
        return $db->getSelectArray("select * from users");
    }

    public static function getUserId($login,$password,Database $db){
        $result = $db->executeSQL("select id, passwd from users where userName = $login");
        if($result){
            if(password_verify($password,$result->passwd)){
                return $result->id;
            } else {
                echo "Niepoprawne hasło</br>";
            }
        } 
        return false;
        
    }

    public function toArray(){
        $arr=[
            "userName" => $this->userName,
            "passwd" => $this->passwd,
            "fullName" => $this->fullName,
            "email" => $this->email,
            "date" => $this->date,
            "status" => $this->status
            ];
        return $arr;
    }

    public function saveToFileJSON($filePath){
        $tab = json_decode(file_get_contents($filePath));
        array_push($tab,$this->toArray());
        file_put_contents($filePath,json_encode($tab));
    }

    public function show() {
        echo "$this->fullName '$this->userName' $this->email password: $this->passwd status: $this->status creation-date: $this->date";
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function setFullName($fullName){
        $this->fullName = $fullName;
    }

    public function getFullName(){
        return $this->fullName;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setPasswd($passwd){
        $this->passwd = password_hash($passwd,PASSWORD_BCRYPT);
    }

    public function getPasswd(){
        return $this->passwd;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }
}
?>
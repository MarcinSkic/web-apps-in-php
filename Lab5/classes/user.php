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

    public static function getExistingNicknames(){
        $jsonUsers = json_decode(file_get_contents("Data/users.json"));
        $xmlUsers = simplexml_load_file("Data/users.xml");

        $uniqueNicknames = []; 

        foreach($xmlUsers as $user){
            $uniqueNicknames[(string)$user->userName] = true;   //Create imitation of set, only keys will be used
        }

        foreach($jsonUsers as $user){
            $uniqueNicknames[$user->userName] = true;
        }

        return $uniqueNicknames;
    }

    public static function showAllUsersFromJSON($filePath){
        $tab = json_decode(file_get_contents($filePath));
        foreach ($tab as $val){
            echo "<p>".$val->userName." ".$val->fullName." ".$val->date."</p>";
        }
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

    public static function showAllUsersFromXML(){
        $allUsers = simplexml_load_file("Data/users.xml");
        echo "<ul>";
        foreach($allUsers as $user){
            echo "<li>".$user->userName." ".$user->fullName." ".$user->date."</li>";
        }
        echo "</ul>";
    }

    public function saveToFileXML(){
        $xml = simplexml_load_file("Data/users.xml");
        $xmlCopy = $xml->addChild("user");

        $xmlCopy->addChild("userName",$this->userName);
        $xmlCopy->addChild("passwd",$this->passwd);
        $xmlCopy->addChild("fullName",$this->fullName);
        $xmlCopy->addChild("email",$this->email);
        $xmlCopy->addChild("date",$this->date);
        $xmlCopy->addChild("status",$this->status);

        $xml->asXML("Data/users.xml");
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
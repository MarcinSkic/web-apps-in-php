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

    public static function showAllUsers($filePath){
        $tab = json_decode(file_get_contents($filePath));
        foreach ($tab as $val){
            echo "<p>".$val->userName." ".$val->fullName." ".$val->date."</p>";
        }
    }

    public function toArray(){
        $arr=[
            "userName" => $this->userName,
            "fullName" => $this->fullName,
            "email" => $this->email
            ];
        return $arr;
    }

    public function save($filePath){

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
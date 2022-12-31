<?php
require_once "../universal/classes/user.php";

class UserManager {
    

    public function loginForm(){
        ?>
        <h2>Formularz logowania</h2>
        <form action="./loginProcess.php" method="POST">
            <label for="login">Login: </label><input type="text" id="login" name="login"><br>
            <label for="password">Hasło: </label><input type="password" id="password" name="password"><br>
            <input type="submit" name="submit" value="Zaloguj">
            <input type="reset" value="Anuluj">
        </form>
        <?php
    }

    private function getValidatedLoginInput(){
        $args = [
            "login" => FILTER_SANITIZE_SPECIAL_CHARS,
            "password" => FILTER_SANITIZE_SPECIAL_CHARS,
        ];

        $data = filter_input_array(INPUT_POST,$args);

        $errors = "";
        foreach($data as $key=>$value){
            if($value === NULL || $value === false){
                if($key === "login"){
                    $errors .= "Brakuje/niepoprawnie podany login</br>";
                } else if($key === "password"){
                    $errors .= "Brakuje/niepoprawnie podane hasło</br>";
                }
            }
        }

        if($errors ===""){
            return $data;
        } else {
            echo $errors;
            return false;
        }
    }

    public function login(Database $db){
        $data = $this->getValidatedLoginInput();
        if(!$data){
            return;
        }

        $id = User::getUserId($data["login"],$data["password"],$db);

        if($id){
            session_start();
            $db->executeSQL("delete from logged_in_users where userId = $id");
            $date = new DateTime('now');
            $date = date("Y-m-d H:i:s");
            $db->executeSQL("insert into logged_in_users values ('".session_id()."', '$id', '$date')");
        }
    }
}
?>
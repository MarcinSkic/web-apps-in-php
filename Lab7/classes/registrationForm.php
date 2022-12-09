<?php
include_once 'user.php';
class RegistrationForm {
    protected $user;
    function __construct(){?>
        <h3>Formularz rejestracji</h3>
        <p>
            <form action="index.php" method="post">
                Nazwa użytkownika: <br/><input name="userName" /><br/>
                Imię i nazwisko: <br/><input name="fullName" /><br/>
                Hasło: <br/><input name="passwd" type="password" /><br/>
                Email: <br/><input name="email" type="email"/><br/>
                <input type="submit" name="submit" value="Rejestruj">
            </form>
        </p>
    <?php
    }

    public function checkUser(){
        $args = [
            'userName' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/^[0-9A-Za-ząęłńśćźżó_-]{2,25}$/'
                ]
            ],
            'fullName' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => [
                    'regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó_-]{2,25} [A-Z]{1}[a-ząęłńśćźżó_-]{2,25}$/'
                ]
            ],
            'passwd' => FILTER_SANITIZE_SPECIAL_CHARS,
            'email' => FILTER_VALIDATE_EMAIL
        ];

        $data = filter_input_array(INPUT_POST, $args);


        $errors = "";
        foreach($data as $key => $value){
            if($value === NULL or $value === false){
                $errors .= "$key ";
            }
        }

        if($errors === ""){
            $this->user = new User($data['userName'],$data['fullName'],$data['email'],$data['passwd']);
        } else {
            echo "<p>Błędne dane: $errors<p>";
            $this->user = NULL;
        }

        return $this->user;
    }
}
?>
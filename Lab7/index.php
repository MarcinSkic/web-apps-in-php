<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz | Lab7</title>
</head>
<body>
    <?php
        include_once 'classes/user.php';
        include_once 'classes/registrationForm.php';
        require_once '../universal/classes/database.php';
        require_once 'functions.php';
        require_once '../universal/passwords.php';

        $rf = new RegistrationForm();
        $db = new Database(["localhost:3306","192.168.1.6:3306"],"root",$mysqlPass,"clients");

        if(filter_input(INPUT_POST,'submit',FILTER_SANITIZE_SPECIAL_CHARS)){
            $user = $rf->checkUser();
            if($user === NULL){
                echo "<p>Niepoprawne dane rejestracji</p>";
            } else {
                if($user->saveToDB($db)){
                    echo "<p>Zarejestrowano</p>";
                    $user->show();
                }
                
                echo "<p>Wszyscy użytkownicy</p>";
                showSelectTable(User::getAllUsersFromDB($db));
            }
        }
    ?>
</body>
</html>
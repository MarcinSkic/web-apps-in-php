<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz | Lab5</title>
</head>
<body>
    <?php
        include_once 'classes/user.php';
        include_once 'classes/registrationForm.php';

        $rf = new RegistrationForm();

        if(filter_input(INPUT_POST,'submit',FILTER_SANITIZE_SPECIAL_CHARS)){
            $user = $rf->checkUser();
            if($user === NULL){
                echo "<p>Niepoprawne dane rejestracji</p>"; 
            } else {
                echo "<p>Zarejestrowano</p>";
                $user->show();
                echo "<h3>Dotychczas zarejestrowani w pliku JSON:</h3>";
                User::showAllUsersFromJSON("Data/users.json");

                $user->saveToFileJSON("Data/users.json");
                $user->saveToFileXML();

                echo "<h3>Aktualnie zarejestrowani w pliku XML:</h3>";
                User::showAllUsersFromXML();
            }
        }
    ?>
</body>
</html>
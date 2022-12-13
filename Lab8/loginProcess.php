<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona logowania | Lab8 </title>
</head>
<body>
    <?php
        require_once "../universal/classes/user.php";
        require_once "../universal/classes/registrationForm.php";
        require_once "../universal/classes/database.php";
        require_once "../universal/functions.php";
        require_once "../universal/passwords.php";
        require_once "classes/userManager.php";

        $userManager = new UserManager();

        if(filter_input(INPUT_POST,'submit')){
            
        } else {
            $userManager->loginForm();
        }
    ?>
</body>
</html>
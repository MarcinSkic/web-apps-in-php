<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona logowania | Lab8 </title>

    <style>
        .logout{
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
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
        $db = new Database(["192.168.1.6:3306","localhost:3306"],"root",$mysqlPass,"clients");

        if(filter_input(INPUT_GET,'logout',FILTER_VALIDATE_BOOL)){
            $userManager->logout($db);
        }

        if(filter_input(INPUT_POST,'submit',FILTER_SANITIZE_SPECIAL_CHARS)){
            $loginData = $userManager->login($db);
            if($loginData){
                
                header("location:testLogin.php");
            }
        } else {
            $userManager->loginForm();
        }
    ?>
    <script>
        const logoutButton = document.createElement('button');
        logoutButton.textContent = "Wyloguj";
        logoutButton.classList.add("logout");
        logoutButton.addEventListener('click',(event) => {
            document.location = "loginProcess.php?logout=1"
        });

        document.body.append(logoutButton);
    </script>
</body>
</html>
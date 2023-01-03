<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona zalogowanych | Lab8</title>
</head>
<body>
    <script>
        const logoutButton = document.createElement('button');
        logoutButton.textContent = "Wyloguj";
        logoutButton.classList.add("logout");
        logoutButton.addEventListener('click',(event) => {
            document.location = "loginProcess.php?logout=1"
        });

        document.body.append(logoutButton);
    </script>
    <?php
        require_once "../universal/classes/database.php";
        require_once "../universal/passwords.php";
        require_once "classes/userManager.php";
        require_once "../universal/classes/user.php";

        session_start();

        $userManager = new UserManager();
        $db = new Database(["192.168.1.6:3306","localhost:3306"],"root",$mysqlPass,"clients");

        if($id = $userManager->getLoggedInUser($db,session_id())){
            $userArr = $db->executeSQL("SELECT * FROM users WHERE id = $id")->fetch_array(MYSQLI_NUM);
            
            echo "<h2>Dane zalogowanego użytkownika:</h2>";
            
            echo "<div>";
            for($i = 1; $i < count($userArr); $i++){
                echo $userArr[$i]." ";
            }
            echo "</div>";
        } else {
            header("location:loginProcess.php");
        }
        
    ?>
</body>
</html>
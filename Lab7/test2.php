<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        echo "Sesja:</br>";
        echo "id = ".session_id()."</br>";
        foreach($_SESSION as $key => $value){
            echo nl2br("$key = $value\n");
        }

        echo "</br>Ciasteczka:</br>";
        foreach($_COOKIE as $key => $value){
            echo nl2br("$key = $value\n");
        }

        if ( isset($_COOKIE[session_name()]) ) {
            setcookie(session_name(),'', time() - 42000, '/');
        }
        session_destroy();
    ?>
    <a href="test1.php">Test1.php</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test2 | Lab7</title>
    <style>
        td{
            text-align: center;
        }

        thead tr{
            font-size: 1.5rem;
            color: white;
            background-color:darkred;
        }

        tbody tr:nth-child(2n){
            background-color: aliceblue;
        }

        tbody tr:nth-child(2n-1){
            background-color: #9db8eb;
        }

        table {
            border: 1px black solid;
            border-spacing: 0px;
        }

        tbody th {
            width: 100px;
        }
    </style>
</head>
<body>
    <?php
        require_once "classes/user.php";
        require_once "functions.php";

        session_start();
        echo "<h3>Sesja:</h3>";
        echo "id = ".session_id()."</br>";
        foreach($_SESSION as $key => $value){
            if($key == 'user'){
                echo "<h3>User</h3>";
                showDictionaryAsTable(unserialize($value)->toArray());
            } else {
                echo nl2br("$key = $value\n");
            }
        }

        echo "<h3>Ciasteczka:</h3>";
        foreach($_COOKIE as $key => $value){
            echo nl2br("$key = $value\n");
        }

        if ( isset($_COOKIE[session_name()]) ) {
            setcookie(session_name(),'', time() - 42000, '/');
        }
        session_destroy();
    ?>
    <h4><a href="test1.php">Do strony 1</a></h4>
</body>
</html>
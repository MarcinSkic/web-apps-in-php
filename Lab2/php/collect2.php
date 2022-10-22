<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB2 | Odebrane 2</title>
</head>
<body>
    <h1>C)</h1>
    <h2>$_REQUEST</h2>
    <?php
        foreach($_REQUEST as $key=>$value){
            echo "$key = $value <br/>";
        }
    ?>
    <h2>$_POST</h2>
    <?php
        foreach($_POST as $key=>$value){
            echo "$key = $value <br/>";
        }
    ?>
    <h2>$_GET</h2>
    <?php
        foreach($_GET as $key=>$value){
            echo "$key = $value <br/>";
        }
    ?>
    <h1>E)</h1>
    <?php
        echo "REQUEST: " , var_dump($_REQUEST) , "<br/>";
        echo "POST: " , var_dump($_POST)  , "<br/>";;
        echo "GET: " , var_dump($_GET)  , "<br/>";;
    ?>
    
</body>
</html>
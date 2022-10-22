<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB2 | Odebrane 3</title>
</head>
<body>
    <h2>Dane odebrane</h2>
    Wybrane tutoriale (używając foreach):
    <?php
        foreach ($_REQUEST['languages'] as $key=>$value){
            echo "$value ";
        }
        echo "<br/>"
    ?>
    Wybrane tutoriale (join()):
    <?php
        echo join(' ',$_REQUEST['languages']);
    ?>
    <h2>Debug</h2>
    Var dump: <?php var_dump($_REQUEST)?> <br/>
    Foreach: <br/>
    <?php
        foreach ($_REQUEST as $key=>$value){
            echo "$key = ";
            if(is_array($value)){
                foreach ($value as $key=>$value){
                    echo "$value ";
                }
            } else {
                echo "$value";
            }
            echo " <br/>";
           
        }
    ?>

</body>
</html>
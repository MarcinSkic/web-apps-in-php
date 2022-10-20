<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pierwszy skrypt w PHP</title>
</head>
<body>
    <?php echo "<h2>Pierwszy skrypt PHP</h2>" ?>
    <?php 
    $n=4567;
    $x=10.123456789;
    echo ("<div>Domyślny format: n=$n, x=$x</div><div> Zaokrąglenie do liczby całkowitej x = ".printf("%.0f",$x)."</div><div> z trzema cyframi po kropce x = ".printf("%.3f",$x)."</div>");
    ?>
</body>
</html>
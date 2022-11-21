<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB4 | Ankieta</title>
</head>
<body>
    <h1>Wybierz technologie, które znasz:</h1>
    <form action="./form.php" method="post">
        <div class="buttons" id="service-cont">
            <?php
                $languages = ["C","CPP","Java","C#","HTML","CSS","XML","PHP","JavaScript"];
                for ($i = 0; $i < count($languages); $i++){
                    echo "<input type='checkbox' name='languages[]' value='".$languages[$i]."' id='".$languages[$i]."'/> <label for='".$languages[$i]."'>".$languages[$i]."</label> <br/>";
                }
            ?>
        </div>
        <input type="submit" name='submit' value="Wyślij" />
    </form>

    <?php
        if(filter_input(INPUT_POST,"submit")){
            
        }
    ?>
</body>
</html>
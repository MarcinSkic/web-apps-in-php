<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB3 | Obsługa plików</title>
</head>
<body>
    <h1>Formularz zamówienia</h1>
    <form action="./form.php" method="get">
        <div class="basic-info">
            <div class="info-row"  id="surname-cont"><label for="surname">Nazwisko:</label> <input type="text" name="surname" id="surname"/> </div>
            <div class="info-row" id="age-cont"><label for="age">Wiek:</label><input type="number" name="age" id="age"/></div>
            <div class="info-row"><label for="country" >Państwo:</label> <select name="country" id="country">
                <option value="pl">Polska</option>
                <option value="de">Niemcy</option>
                <option value="gb">Wielka Brytania</option>
                <option value="fr">Francja</option>
            </select></div>
            <div class="info-row" id="email-cont"><label for="email">Adres e-mail:</label> <input type="email" name="email" id="email"></div>
        </div>
        
        <h4>Zamawiam tutorial z języka:</h4>
        <div class="buttons" id="service-cont">
            <?php
                $languages = ["C","CPP","Java","C#","HTML","CSS","XML","PHP","JavaScript"];
                for ($i = 0; $i < count($languages); $i++){
                    echo "<input type='checkbox' name='languages[]' value='".$languages[$i]."' id='".$languages[$i]."'/> <label for='".$languages[$i]."'>".$languages[$i]."</label>";
                }
            ?>
        </div>
        <h4>Sposób zapłaty:</h4>
        <div class="buttons" id="payment-cont">
            <input type="radio" name="payment" value="eu" id="eu" /> <label for="eu">eurocard</label>
            <input type="radio" name="payment" value="visa" id="visa" /> <label for="visa">visa</label>
            <input type="radio" name="payment" value="transfer" id="transfer" /> <label for="transfer">przelew bankowy</label>
        </div>
        <input type="reset" value="Anuluj" />
        <input type="submit" name='submit' value="Zapisz" />
        <input type="submit" name='submit' value="Pokaż" />
        <input type="submit" name='submit' value="PHP" />
        <input type="submit" name='submit' value="CPP" />
        <input type="submit" name='submit' value="Java" />
    </form>

    <?php
        include_once "functions.php";
        
        if(isset($_REQUEST['submit'])){
            $choice = $_REQUEST['submit'];

            switch ($choice){
                case "Zapisz": 
                    add();
                    break;
                case 'Pokaż':
                    show();
                    break;
                case 'PHP':
                    showWithOrder("PHP");
                    break;
                case 'CPP':
                    showWithOrder("CPP");
                    break;
                case 'Java':
                    showWithOrder("Java");
                    break;

            }
        }

        print("<br/>");
        print("<br/>");
        print("<br/>");
        print("<br/>");
        
        foreach($_SERVER as $key=>$value){
            
            print("$key = $value<br/>");
        }

    ?>
</body>
</html>
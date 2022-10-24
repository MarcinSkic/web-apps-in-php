<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB2 | Dane klienta</title>
</head>
<body>
<h2>Dane klienta</h2>
    <?php
        function valueValidation($value){
            return isset($value)&&($value!="");
        }

        $surnameRaw = $_REQUEST['surname'];
        if(valueValidation($surnameRaw)){
            $surname = htmlspecialchars(trim($surnameRaw));
            echo "Nazwisko: $surname <br />";
        } else {
            echo "Nie podano nazwiska <br />";
        }

        $ageRaw = @$_REQUEST['age'];
        if(valueValidation($ageRaw)){
            $age = htmlspecialchars(trim($ageRaw));
            echo "Wiek: $age <br />";
        } else {
            echo "Nie podano wieku <br />";
        }

        $countryRaw = @$_REQUEST['country'];
        if(valueValidation(($countryRaw))){
            $country = htmlspecialchars(trim($countryRaw));
            echo "Kraj: $country <br />";
        } else {
            echo "Nie podano kraju <br />";
        }

        $emailRaw = @$_REQUEST['email'];
        if(valueValidation(($emailRaw))){
            $email = htmlspecialchars(trim($emailRaw));
            echo "Email: $email <br />";
        } else {
            echo "Nie podano email <br />";
        }
    ?>
</body>
</html>
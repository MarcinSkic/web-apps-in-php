<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB2 | Odebrane 4</title>
</head>
<body>
    <?php
         echo "Zamówione kursy: ";
         if(isset($_REQUEST['PHP'])){
             echo "PHP ";
         }
         if(isset($_REQUEST['C'])){
             echo "C/C++ ";
         }
         if(isset($_REQUEST['Java'])){
             echo "Java";
         }
         echo "<br/>";
 
         $paymentRaw = $_REQUEST['payment'];
         if(valueValidation(($paymentRaw))){
             $payment = htmlspecialchars(trim($paymentRaw));
             echo "Sposób płatności: $payment <br />";
         } else {
             echo "Nie podano email <br />";
         }

         echo "<h2><a href='onlyClientData.php?surname='".$_REQUEST['surname']."'&age=&country=pl&email='>Dane Klienta</a></h2>"
    ?>
</body>
</html>
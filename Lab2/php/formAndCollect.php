<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB2 | Formularz i Odebrane w jednym</title>
</head>
<body>
<?php
    //skrypt generuje formularz i jednoczesnie
    //odbiera dane z niego wysłane
    if (isset($_POST['tekst'])) //przesłano żądanie z parametrem 'tekst'
    { 
        $tekst=htmlspecialchars( $_POST['tekst']);
        print "Wpisano: $tekst <br/>";
        print "<a href='formAndCollect.php'> Powrót do formularza</a>";
    }
    else
    { 
        print "Podaj tekst :<form method='post'action='formAndCollect.php'>";
        print "<input type='tekst' name='tekst' size='30' />";
        print "<input type='submit' value='Wyślij' />";
        print "</form>";
    }
?>
</body>
</html>
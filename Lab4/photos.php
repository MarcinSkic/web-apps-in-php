<?php
    if (isset($_POST['zapisz']) && $_POST['zapisz'] == 'Zapisz' && !isset($_GET['pic'])) {
        if (is_uploaded_file($_FILES['zdjecie']['tmp_name'])) {
            $typ = $_FILES['zdjecie']['type'];

            if ($typ === 'image/jpeg') {
                move_uploaded_file($_FILES['zdjecie']['tmp_name'],'./photos/'.$_FILES['zdjecie']['name']);
                $link = $_FILES['zdjecie']['name'];
                $random = uniqid('img_'); //wygenerowanie losowej wartości
                $zdj = $random . '.jpg';
                copy($link, './' . $zdj); //utworzenie kopii zdjęcia
                list($width, $height) = getimagesize($zdj); //pobranie rozmiarów obrazu
                $wys = $_POST['wys']; //wysokość preferowana przez użytkownika
                $szer = $_POST['szer']; //szerokość preferowana przez użytkownika
                $skalaWys = 1;
                $skalaSzer = 1;
                $skala = 1;
                if ($width > $szer) $skalaSzer = $szer / $width;
                if ($height > $wys) $skalaWys = $wys / $height;
                if ($skalaWys <= $skalaSzer) $skala = $skalaWys;
                else $skala = $skalaSzer;
                //ustalenie rozmiarów miniaturki tworzonego zdjęcia:
                $newH = $height * $skala;
                $newW = $width * $skala;

                header('Content-Type: image/jpeg');
                $nowe = imagecreatetruecolor($newW, $newH); //czarny obraz
                $obraz = imagecreatefromjpeg($zdj);
                imagecopyresampled($nowe, $obraz, 0, 0, 0, 0,
                $newW, $newH, $width, $height);
                imagejpeg($nowe, './mini/' . $link, 100);
                echo "nowe=/mini-$link <br>";
                imagedestroy($nowe);
                imagedestroy($obraz);
                unlink($zdj);
                $dlugosc = strlen($link);
                $dlugosc -= 4;
                $link = substr($link, 0, $dlugosc);
                echo "link=$link <br/>";
                header('location:photos.php?pic='.$link);
            }
            else {
                header('location:photos.html');
            } 
        }
    }

    if (isset($_GET['pic']) && !empty($_GET['pic']))
    {

        //$katalog=filter_input(INPUT_SERVER,'DOCUMENT_ROOT'."/mini");
        $counter = 0;
        $dc_root = $_SERVER['DOCUMENT_ROOT'];
        $katalog="$dc_root/mini/";

        //var_dump($katalog);
        $kat=@opendir($katalog) or die("Nie można otworzyć katalogu");
        while ($plik = readdir($kat))
            if($plik != '.' && $plik != '..') {
                echo "<a href='/photos/$plik'><img src='./mini/$plik' alt='$plik'></a>";
                $counter++;
            }
        closedir($kat);

        //echo '<a href="' . $_GET['pic'] . '.jpg">Zdjęcie</a><br/>';
        //echo '<a href="mini-' . $_GET['pic'] . '.jpg"> Miniatura</a><br/><br/>';
        echo "<br/>Liczba plików w galerii $counter<br/>";
        echo '<a href="photos.html">Powrót</a>';
    }
    echo "alive"; 
?>
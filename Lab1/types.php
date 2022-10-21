<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAB1 | Types experiments</title>
</head>
<body>
    <?php

        function arrayToString($array){
            $string = "";
            $string .= "[ ";
            for($i = 0; $i < count($array);$i++){
                $string .= $array[$i]." ";
            }
            $string .= " ]";
            return $string;
        }

        $a = 1234;
        $b = 567.789;
        $c = 1;
        $d = 0;
        $e = true;
        $f = "0";
        $g = "Typy w PHP";
        $h = [1,2,3,4];
        $i = [];
        $j = ["zielony", "czerwony","niebieski"];
        $k = ["Agata" , "Agatowska", 4.67, true];
        $l = new DateTime();

        echo "<h2>a)</h2>";
        echo "a = $a<br/>";
        echo "b = $b<br/>";
        echo "c = $c<br/>";
        echo "d = $d<br/>";
        echo "e = $e<br/>";
        echo "f = $f<br/>";
        echo "g = $g<br/>";
        echo "h = ".arrayToString($h)."<br/>";
        echo "i = ".arrayToString($i)."<br/>";
        echo "j = ".arrayToString($j)."<br/>";
        echo "k = ".arrayToString($k)."<br/>";
        echo "l = ".$l->format("Y-m-d H-i-s")."<br/>";

        echo "<h2>b)</h2>";
        echo "is_bool(a) = ".is_bool($a)."<br/>";
        echo "is_bool(c) = ".is_bool($c)."<br/>";
        echo "is_bool(d) = ".is_bool($d)."<br/>";
        echo "is_bool(e) = ".is_bool($e)."<br/>";
        echo "is_bool(f) = ".is_bool($f)."<br/>";

        echo "is_int(a) = ".is_int($a)."<br/>";
        echo "is_int(b) = ".is_int($b)."<br/>";
        echo "is_int(e) = ".is_int($e)."<br/>";
        echo "is_int(f) = ".is_int($f)."<br/>";

        echo "is_numeric(a) = ".is_numeric($a)."<br/>";
        echo "is_numeric(b) = ".is_numeric($b)."<br/>";
        echo "is_numeric(d) = ".is_numeric($d)."<br/>";
        echo "is_numeric(e) = ".is_numeric($e)."<br/>";
        echo "is_numeric(h) = ".is_numeric($h)."<br/>";

        echo "is_string(a) = ".is_string($a)."<br/>";
        echo "is_string(e) = ".is_string($e)."<br/>";
        echo "is_string(f) = ".is_string($f)."<br/>";
        echo "is_string(j) = ".is_string($j)."<br/>";

        echo "is_array(a) = ".is_array($a)."<br/>";
        echo "is_array(g) = ".is_array($g)."<br/>";
        echo "is_array(h) = ".is_array($h)."<br/>";
        echo "is_array(i) = ".is_array($i)."<br/>";
        echo "is_array(l) = ".is_array($l)."<br/>";

        echo "is_object(a) = ".is_object($a)."<br/>";
        echo "is_object(e) = ".is_object($e)."<br/>";
        echo "is_object(g) = ".is_object($g)."<br/>";
        echo "is_object(h) = ".is_object($h)."<br/>";
        echo "is_object(k) = ".is_object($k)."<br/>";
        echo "is_object(l) = ".is_object($l)."<br/>";

        echo "<h2>c)</h2>";
        echo "1 == true = ".($c == $e)."<br/>";
        echo "1 === true = ".($c === $e)."<br/>";
        echo "0 == \"0\" = ".($d == $f)."<br/>";
        echo "0 === \"0\" = ".($d === $f)."<br/>";

        echo "<h2>d)</h2>";
        echo "var_dump(h) = " , var_dump($h) , "<br/>"; 
        echo "var_dump(i) = " , var_dump($i) , "<br/>"; 
        echo "var_dump(k) = " , var_dump($k) , "<br/>"; 
        echo "print_r(h) = " , print_r($h) , "<br/>"; 
        echo "print_r(k) = " , print_r($k) , "<br/>"; 
    ?>
</body>
</html>
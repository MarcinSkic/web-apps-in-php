<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <style>
        .gallery {
            background-color: black;
            width: min-content;
        }

        .butBetter {
            display: grid;
            grid-template: 1fr 1fr 1fr / 1fr 1fr;
        }
    </style>
</head>
<body>
    <div class="gallery">
        <?php
            function gallery($rows, $cols){
                print("<table>");
                for($i = 0; $i < $rows; $i++){
                    echo "<tr>";
                    for ($x = 0; $x < $cols; $x++){
                        $number = $i*$cols+$x;
                        print("<td><img src='images/img$number.png' alt='img$i'></td>");
                    }
                    echo "</tr>";
                }
                print("</table>");
            }
            gallery(1,7);
        ?>
    </div>
    <?php
        function galleryButBetter($rows, $cols){
            print("<div class='gallery butBetter'>");
            for($i = 0; $i < $rows; $i++){
                for ($x = 0; $x < $cols; $x++){
                    $number = $i*$cols+$x;
                    print("<img src='images/img$number.png' alt='img$i' style='grid-rows: $i /".($i+1)." grid-columns: $x / ".($x+1)." '>");
                }
            }
            print("</div>");
        }

        galleryButBetter(3,3);
    ?>
    
</body>
</html>
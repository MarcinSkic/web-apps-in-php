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
    <form action="./survey.php" method="post">
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
            function validateSurvey(){
                $args = [
                    'languages' => [
                        'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                        'flags' => FILTER_REQUIRE_ARRAY
                    ]
                ];
                $data = filter_input_array(INPUT_POST,$args);
        
                $errors = "";
                foreach ($data as $key => $val){
                    if($val === false or $val === NULL){
                        $errors .= "$key ";
                    }
                }
        
                if($errors === ""){
                    toSurvey($data);
                } else {
                    echo "<br/>Nie udane głosowanie";
                }
            }
        
            function getSurveyResults(){
                $d_root = $_SERVER['DOCUMENT_ROOT'];
                $arrayFromFile = file("$d_root/../ExtraFiles/Lab4/survey.txt");
                $dict = [];

                foreach($arrayFromFile as $value){
                    if(str_contains($value,"=")){
                        $exploded = explode("=",$value);
                        $key = $exploded[0];
                        $value = intval($exploded[1]);
                        $dict[$key] = $value;
                    }       
                }

                return $dict;
            }

            function showSurveyResults($dict){
                echo "<h3>Wyniki ankiety: </h3>";
                foreach ($dict as $key=>$value){
                    echo "$key=$value<br/>";
                }
            }

            function toSurvey($filteredData){
                $dict = getSurveyResults();
                
                $newVotes = "";
                $data = "";
                foreach ($filteredData['languages'] as $key=>$value){
                    $newVotes .= "$value ";
                    if(array_key_exists($value,$dict)){
                        $dict[$value]++;
                    } else {
                        $dict[$value] = 1;
                    }
                }

                foreach ($dict as $key=>$value){
                    $data .= "$key=$value\n";
                }
        
                $d_root = $_SERVER['DOCUMENT_ROOT'];
                $file = fopen("$d_root/../ExtraFiles/Lab4/survey.txt","w+") or die("Nie można otworzyć pliku");
        
                fwrite($file,$data);
        
                fclose($file);
        
                echo "<p>Zagłosowano na $newVotes</p>";
                //Show weird look
                echo "<p>Zapisano: </p><br/>";
                echo nl2br($data);
                
            }

            validateSurvey();
            showSurveyResults(getSurveyResults());
            
        }
    ?>
</body>
</html>
<?php
    function showSelectTable(array $selectArray){
        $table = "<table>";

        if(count($selectArray) === 0) return;
        
        $table.="<thead><tr>";
        foreach($selectArray[0] as $key=>$value){
            $table.="<th>".$key."</th>";
        }
        $table.="</tr></thead>";

        $table.="<tbody>";
        foreach($selectArray as $record){

            $table.="<tr>";
            foreach($record as $value){
                $table.="<td>".$value."</td>";
            }
            $table.="</tr>";

        }
        $table.="</tbody>";

        $table.= "</table>";
        echo $table;
    }

    function showDictionaryAsTable(array $assocArray){
        $table = "<table>";

        $table.="<thead><tr>";
        $table.="<th>Klucz</th>";
        $table.="<th>Wartość</th>";
        $table.="</tr></thead>";

        $table.="<tbody>";
        foreach($assocArray as $key=>$value){
            $table.="<tr>";
            $table.="<th>$key</th>";
            $table.="<td>$value</td>";
            $table.="</tr>";
        }
        $table.="</tbody>";

        $table.= "</table>";
        echo $table;
    }
?>
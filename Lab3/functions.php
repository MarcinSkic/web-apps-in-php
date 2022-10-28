<?php
function add(){
            $data = "";
            foreach ($_REQUEST as $key=>$value){
                if($key=='languages'){
                    foreach($value as $key=>$value){
                        $data .= htmlspecialchars($value).",";
                    }
                    continue;
                }
                if($key == 'submit') continue;

                $data .= htmlspecialchars($value)." "; 
            }
            $data .= "\n";

            $d_root = $_SERVER['DOCUMENT_ROOT'];
            $file = fopen("$d_root/../ExtraFiles/Lab3/data.txt","a+");

            fwrite($file,$data);

            fclose($file);
            
        }

        function show(){
            $d_root = $_SERVER['DOCUMENT_ROOT'];
            $arrayFromFile = file("$d_root/../ExtraFiles/Lab3/data.txt");

            foreach($arrayFromFile as $value){
                print("$value<br/>");
            }
        }

        function showWithOrder($order){
            $d_root = $_SERVER['DOCUMENT_ROOT'];
            $arrayFromFile = file("$d_root/../ExtraFiles/Lab3/data.txt");

            foreach($arrayFromFile as $value){
                if(str_contains($value,$order)){
                    print("$value<br/>");
                }
            }
        }
?>
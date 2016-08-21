<?php
//"Loo lihtne kommentaaride lisamise vorm. Andmed salvesta tekstifaili. Kuva salvestaud kommentaare."


function add_comment(){
    
    if(!empty($_POST['username'])&& !empty($_POST['komm'])){
        
       
        $nimi = $_POST['username'];
        $komm = $_POST['komm'];
        
        $file = fopen("kommid.txt", "a");
        fwrite($file, $nimi."\n");
        fwrite($file, $komm."\n");
        fclose($file);    
        
    } else {
        
        echo "<h2>Väljad peavad olema täidetud!</h2>";
        
    }
    
}

function kuva(){
    
            
        if(isset($_POST['submit'])){
           add_comment();
        }
        
        ?>
        
        </div>
        
        <div id="kuva">
            Kommentaarid: <br>
            
            <?php
            
            $arrays = array();
            
            $file = "kommid.txt";
            $file = fopen($file, "r");
            while(!feof($file)){
                
                
                $data[] = fgets($file);
            
              
            }
            fclose($file);
         
            
            for($i=0; $i < sizeof($data) - 1; $i++){
                
                if($i%2 === 0){
                                    
                echo "<p>Autor: " . $data[$i] . "<br>";
                                    
                } else {
                    
                    echo "Kommentaar: "  . $data[$i] . "</p>";
                    
                }
                
            }
                   
    
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Kommentaaride lisamise vorm</title>
    </head>
    <body>
        <div id="lisa">
       <form action="" method="post" name="kommentaarivorm">
           
            Kasutajanimi: <br>
            <input type="text" name="username"><br>
            Kommentaar: <br>
            <textarea name="komm" rows="6" cols="50"></textarea><br>
            <input type="submit" name="submit" value="Valmis">

        </form>
        
        <?php

              kuva();
            
            ?>
            
                    
        </div>
   </body>

</html>
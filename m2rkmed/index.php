<?php
   
   require_once("functions.php");


?>


<!DOCTYPE HTML>
<html>
    <head>
      <meta charset="utf-8">
      <title>Märkmete lisamine</title>
    
    </head>
    
    <body>
         
     Tere! Märkmete lisamiseks ja vaatamiseks logi sisse või registreeru!
        
        <div>
            
            Logimise vorm:
            
            <form action="" method="post">
            Kasutajanimi:
            <input type="text" name="kasutajanimi">
            Parool:
            <input type="text" name="pass">
            <input type="submit" name="logi" value="valmis">
            
            
            
            </form>
            
            <?php 
                
            if(isset($_POST['logi'])){
                if(!isset($_SESSION['user'])){
                    
                log_in(); 
                    
                } else {
                    
                    echo "<h3>Oled juba sisse logitud</h3>";
                    header("Location: lisa.php");
                    
                }
                
            }
            
                        
            ?>
        
        
        
        </div>
        <div>
          Registreerimise vorm:
          
            <form action="" method="post">
            Soovitud kasutajanimi:
            <input type="text" name="nimi">
            Soovitud parool:
            <input type="text" name="parool">
            <input type="submit" name="rega" value="valmis">
            </form>
            
            <?php
            
            if(isset($_POST['rega'])){
             
               register();
            
            }
            
            ?>
            
        </div>
    
    </body>


</html>
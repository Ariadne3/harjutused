<?php

$connection = mysqli_connect('localhost', 'root', '', 'eksam');


function getIp() {
    
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    
            return $ip;
    }

function add_to_database(){
    
    global $connection;
    
    $ip = getIp();
    
    $sql = "INSERT INTO ip(id, ip) VALUES (null, '$ip')";
    $query = mysqli_query($connection, $sql);
    
    if(!$query){
        
        die("ei õnnestunud") . mysqli_error($connection);
        
    }
    
        
}


   function display_ip(){
       
       global $connection;
       $sql = "SELECT * FROM ip";
       $query = mysqli_query($connection, $sql);
       
       while($row = mysqli_fetch_assoc($query)){
           
           $ip = $row['ip'];
           echo "<p>" . $ip . "</p>";
       }
       
       
       
   }



?>


<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <title>Hüpotenuusi kalku</title>
 </head>
 <body>
     
     <div>
         
         <?php
         
         add_to_database();
         display_ip();
         
         ?>
         
         
     </div>
          
    </body>
</html>
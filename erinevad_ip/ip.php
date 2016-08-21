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
       $ip = mysqli_real_escape_string($connection, $ip);
       $sql = "INSERT INTO adred(id, ip)VALUES(null, '$ip')";
       $query = mysqli_query($connection, $sql);
       
       if(!$query){
           
           die("miskit läks valesti: " . mysqli_error($connection));
           
       }
       
              
   }


 function display_list(){
     
     global $connection;
     $sql = "SELECT DISTINCT(ip) FROM adred";
     $query = mysqli_query($connection, $sql);
     
     while($row = mysqli_fetch_assoc($query)){
         
         $ip = $row['ip'];
         echo "$ip" . "<br>";
         
     }
     
     
 }



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>kuva erinevad ip-d</title>
    
    </head>
    <body>
        <p>külastajate ip-adred: </p>
    
       <?php
         
          add_to_database();
          display_list();
        ?>
    
    </body>


</html>
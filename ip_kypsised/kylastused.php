<?php
 $connection = mysqli_connect('localhost', 'root', '', 'eksam');
   

 function count_visits(){
     
     global $connection;
     $sql = "SELECT * FROM loendur";
     $query = mysqli_query($connection, $sql);
  
    
            
     $row = mysqli_fetch_assoc($query);
         $count = $row['count'];
         
     if($count == 0){
          $count = $count + 1;
         $sql = "INSERT INTO loendur(count)VALUES($count)";
         
         
     }else{
        
     $count = $count + 1;
     $sql = "UPDATE loendur SET count = $count";
     }
     $query = mysqli_query($connection, $sql);
     
     
     
     return $count;
     
 }

?>

<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    </head>
    
    <body>
    
        <?php echo "Oled selle lehe " . count_visits() . " külastaja";
        
        ?>
    
    </body>
    
    
    
</html>
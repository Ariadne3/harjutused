<?php
//igal kasutajal oma märkmed...


    
function add_note(){
    
        
    if(empty($_POST['note'])){
        
        echo "<h2>Midagi pole lisada!</h2>";
        
    } else {
        
        $uus = $_POST['note'];
            
        setcookie("note", $uus, time()+ 3600 * 24 * 365);
            
      
        
    }
        
}
  

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Märkmed küpsistega</title>
    </head>
<body>
    <div>
        <p>Siia saad sisestada oma märkmeid: </p>
         <form action="" method="post">
            <textarea name="note" rows="5" cols="50"></textarea><br>
             <input type="submit"name="submit" value="Lisa">
                
        </form>
        
        <?php 
            
            if(isset($_POST['submit'])){
                
                add_note();
                
            }
        
        ?>
    
    </div>
    <div>
        <p>Siin on sinu märkmed: </p>
        
       <?php
           
           print_r([$_COOKIE]);
        echo "<br>";
        
           
        
        ?>
    
    </div>
    
    
</body>

</html>
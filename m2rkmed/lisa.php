<?php
    
    include "functions.php";
    



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Märkmete lisamine</title>
</head>
    
<body>
    <div>
        <form action="" method="post">
        <input type="submit" name="lahku" value="logi välja">
        </form>
        <?php 
           
        if (isset($_POST['lahku'])){
            log_out();
        }
        
        ?>
    
    </div>
    <div>
        <p>Siin saad märkmeid lisada: </p>
        <form action="" method="post">
        <textarea name="note" rows="10" cols= "50"></textarea>
        <input type="submit" name="lisatud" value="valmis">
        
        </form>
        
        <?php
        print_r($_SESSION);
        echo "user: " . $_SESSION['user'];
        if(isset($_POST['lisatud'])){
            
            add_notes();
            
        }
            
        ?>
    </div>
    
    <div>
        <p>Sinu lisatud märkmed:</p>
        
       <?php
           view_notes();
        ?>
        
    </div>
    
    
</body>
</html>


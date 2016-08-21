<?php
//"Loo lihtne kommentaaride lisamise vorm. Andmed salvesta andmebaasi. Kuva salvestaud kommentaare."

$connection = mysqli_connect('localhost', 'root', '', 'eksam');

function add_comment(){
    
    if(!empty($_POST['username'])&& !empty($_POST['komm'])){
        
        global $connection;
        $nimi = mysqli_real_escape_string($connection, $_POST['username']);
        $komm = mysqli_real_escape_string($connection, $_POST['komm']);
        $sql = "INSERT INTO kommentaarid(id, nimi, kommentaar, kuupaev) VALUES(null, '$nimi', '$komm', now())";
        $query = mysqli_query($connection, $sql);
        
        if(!$query){
        die("ühendust ei õnnestunud luua ") . mysqli_error($connection);
    
        }
        
    } else {
        
        echo "<h2>Väljad peavad olema täidetud!</h2>";
        
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
        
        if(isset($_POST['submit'])){
           add_comment();
        }
        
        ?>
        
        </div>
        
        <div id="kuva">
            Kommentaarid: <br>
            
            <?php
            
            global $connection;
    
                $sql = "SELECT * FROM kommentaarid";
                $query = mysqli_query($connection, $sql);

                    while($row = mysqli_fetch_assoc($query)){
                    $nimi = $row['nimi'];
                    $komm = $row['kommentaar'];
                    $kuup = $row['kuupaev'];
                    
                    echo "<div>";
                
                    echo "Nimi:" ;
                    echo $nimi . "<br>";
                    echo "<td>Kuupäev: </td>";
                    echo $kuup. "<br>";
                    
                    echo "Kommentaar: " . "<br>";
                    echo $komm;
                    
                    echo "</div>" . "<br>";
                        
                   }
            
                    
                    
           
    
            
            ?>
            
            
        
        
        </div>
   </body>

</html>
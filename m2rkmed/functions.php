<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '', 'eksam');
    
function register(){
    
    global $connection;
    
    
    if(empty($_POST['nimi'])||empty($_POST['parool'])){
        
        echo "<h2>Täida kõik väljad!</h2>";
        
    } else {
        
        $nimi = mysqli_real_escape_string($connection, $_POST['nimi']);
        $pass = mysqli_real_escape_string($connection, $_POST['parool']);
        
        $sql = "INSERT INTO kasutajad(id, nimi, parool) VALUES (null, '$nimi', sha1('$pass'))";
        $query = mysqli_query($connection, $sql);
        
        if(!$query){
            
            die("ühendust ei õnnestunud luua") . mysqli_error($connection);
            
        }
          $_SESSION['user'] = $nimi;
          
      
        
        
    }
    
    
    
    
}


function log_in(){
    
    global $connection;
    
    
    if(empty($_POST['kasutajanimi'])||empty($_POST['pass'])){
        
        echo "<h2>Täida kõik väljad!</h2>";
        
    } else {
    
        $nimi = mysqli_real_escape_string($connection, $_POST['kasutajanimi']);
        $pass = mysqli_real_escape_string($connection, $_POST['pass']);
        $sql  = "SELECT nimi from kasutajad WHERE nimi = '$nimi' AND parool =  '" . sha1($pass) . "'";
            $query   = mysqli_query($connection, $sql);
            $rownums = mysqli_num_rows($query);
            
            if ($rownums > 0) {
                $_SESSION['user'] = $_POST['kasutajanimi'];
                header("Location: lisa.php");
                
            } else {
                echo "<h2>vigane kasutajanimi või parool!</h2>";
            }
        
  }
    
}


function add_notes(){
    
    global $connection;
     
    if(!empty($_POST['note'])){
        
        $kasutaja =  mysqli_real_escape_string($connection, $_SESSION['user']);
        $note = mysqli_real_escape_string($connection, $_POST['note']);
        
        $sql = "INSERT INTO notes (kasutaja, note, date) VALUES ('$kasutaja', '$note', now())";
        $query = mysqli_query($connection, $sql);
        
        if(!$query){
            
            die("midagi läks valesti...") . mysqli_error($connection);
        }
        
    }else{
        
        echo "<h2>Midagi pole lisada!</h2>";
        
    }
    
    
    
}


function view_notes(){
    
    global $connection;
    $kasutaja = $_SESSION['user'];
    $sql = "SELECT * FROM notes WHERE kasutaja = '$kasutaja'";
    $query = mysqli_query($connection, $sql);
    
    while($row = mysqli_fetch_assoc($query)){
        
        $date = $row['date'];
        $note = $row['note'];
        echo "<div>";
        echo "<br>";
        echo $date . "<br>";
        echo $note . "<br>";
        echo "</div>";
        
        
    }
    
        
}

function log_out(){
    
    $_SESSION = array();
    session_destroy();
    header("Location: index.php");
    
    
}




?>
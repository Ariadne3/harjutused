<?php


// Create connection
$connection = mysqli_connect('localhost', 'root', '', 'eksam');//server, default username, default password, andmebaas;

if(!$connection){
    echo "ühendust ei õnnestunud luua " . mysqli_error();

}
     
function get_like_count(){
    
    global $connection;
    $query = mysqli_query($connection, "SELECT like_arv FROM likenupp");
    $row = mysqli_fetch_assoc($query);
    $like = $row['like_arv'];
    return $like;
    /*
    echo "<p>Praegune Like'de arv on: ";
    echo "<p>$like</p>";
    */
    
}



function add_like(){
    
    global $connection;
    $current_likes = get_like_count();
    $current_likes = $current_likes + 1;
    $query = mysqli_query($connection, "UPDATE likenupp SET like_arv = $current_likes");
   
        
}

   
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">

<!--"Loo leheküljele \"like\" nupp. Kuva välja \"like\"-ide arvu. Andmed salvesta andmebaasi."-->
<title>Like Nupp Andmebaasiga</title>
    <style>
        #but {
            
            background-color: blue;
            color: white;
            
        }
    
    </style>
    </head>
    <body>
        
        <?php
        if(isset($_POST['submit'])){
        add_like();
        
            
   }
        ?>
        
        <p>Lehele antud like'de arv on hetkel <?php echo get_like_count();?></p>
      
     <form action="" method="post">
         Lisa ka oma like: 
  <input type="submit" id = "but" name ="submit"value="Like">
</form>
        
        <?php 
           if(isset($_POST['submit'])){
               echo "<p>Tänan!</p>";
           }
        ?>
    
    
    </body>
</html>
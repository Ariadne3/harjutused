

<?php include "like_functions.php";?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">

<!--"Loo leheküljele \"like\" nupp. Kuva välja \"like\"-ide arvu. Andmed salvesta andmebaasi."-->
<title>Like Nupp Tekstiga</title>
    <style>
        #but {
            
            background-color: blue;
            color: white;
            
        }
    
    </style>
    </head>
    <body>
        

<p>Lehele antud like'de arv on hetkel <?php echo get_like_count();?></p>
   
      
     <form action="antud.php" method="post">
         Lisa ka oma like: 
  <input type="submit" id = "but" name ="submit"value="Like">
</form>
     
    
    </body>
</html>
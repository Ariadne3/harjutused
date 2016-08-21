<?php

//ülesanne: Loo lihtne kalkulaator, mis arvutab täisnurkse kolmnurga kahe kaateti järgi välja hüpotenuusi pikkuse.

function arvuta(){
    
    

    if(isset($_POST['submit'])){
        
        if(empty($_POST['k1']) || empty($_POST['k2'])){
            
             echo "<h1>TÄIDA KÕIK VÄLJAD!!!</h1>";
            
        }else{
            
           $kaatet1 = $_POST['k1'];
           $kaatet2 = $_POST['k2'];
           $hypo = $kaatet1 * $kaatet1 + $kaatet2 * $kaatet2;
            
    }


}
    
    return $hypo;
    
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
      <form action="" method="post">
      <table>
      <tr>
          <td>Esimene kaatet:</td>
           <td>Teine kaatet:</td>
       
      </tr>
      <tr>   
          <td><input type="text" name="k1"></td>
          <td><input type="text" name="k2"></td>
       </tr>
    
      </table>
        <input type="submit" name= "submit" value="Arvuta">
      </form>
         
     </div>
     <div>
          <?php 
           echo  "Selle kolmnurga hüpotenuus on " . arvuta(); 
         
         ?>
        
     </div>
</body>
</html>
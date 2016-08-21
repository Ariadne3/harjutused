<?php
  session_start();

?>


<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8">
        <title>Viimati külastasid</title>
    
    </head>
    <body>
    
         <?php
        
          if (!isset($_COOKIE['kylastas'])) {
	$viimati = date('Y-m-d H:i:s', strtotime('+1 hours'));
    setcookie("kylastas", $viimati, time()+3600*24*365);
              $viimati_kylastas = "sa pole seda lehte külastanud";
      
	
	
} else {
      
	$viimati_kylastas = $_COOKIE['kylastas'];
	$viimati = date('Y-m-d H:i:s', strtotime('+1 hours'));
	setcookie("kylastas", $viimati, time()+3600*24*365);
	
}
    
        
           echo "Sinu viimane külastus siin lehel oli: " . $viimati_kylastas;
        
        
        ?>
    
    </body>

</html>
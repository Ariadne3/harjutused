<?php

//"Loo veebilehekülg, mis kuvab kasutajale, mitmendat korda kasutaja lehekülge külastab."

session_start();
//$session = session_id();

function count_visits(){
    
if (!isset($_COOKIE['kylastused'])) {
    
	$visits = 1;
    setcookie("kylastused", $visits, time()+3600*24*365);
	
} else {
    
	$visits = $_COOKIE['kylastused']+1;
	setcookie("kylastused", $visits, time()+3600*24*365);
	
}
    
    return $visits;
    
}



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sinu külastuste arv</title>
    </head>
    <body>
        
        <?php
           
           echo "Oled seda lehte külastanud " . count_visits() . " korda";
        
        
        ?>
    
    </body>
</html>
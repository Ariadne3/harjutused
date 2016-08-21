<?php
   
   session_start();
/*
   function add_visitor(){
   
    $counter_file = "counter.txt";

    if(!file_exists($counter_file)){ //kui faili pole olemas teeme
        
        $file = fopen($counter_file, "w");
        fwrite($file, 0);
        fclose($file);
    
    }

     $file = fopen($counter_file, "r");  //praegune külastajate arv
       
     if(!filesize($counter_file)){
         $visitors = 0;
     }else{
     $visitors = fread($file, filesize($counter_file));
     }
     fclose($file);

if(!isset($_SESSION['has_visited'])){
    
    $_SESSION['has_visited'] = "yes";  
    $visitors++;
    $file = fopen ($counter_file, "w");
    fwrite($file, $visitors);
    fclose($file);
    
}
   }
*/

$cookie_name = 'counter';
$file = 'count.txt';

if(!file_exists($file)){
    
    $f = fopen($file, "w");
    fwrite($f, "0");
    fclose($f);
} else {

if (!isset($_COOKIE[$cookie_name])) {
    $count = strval(file_get_contents($file));
    file_put_contents($file, $count + 1);
    setcookie($cookie_name, "Checked", time() + 111400);
}
}

?>

<!DOCTYPE html>
<html>
   <!--"Loo lihtne veebilehe külastajate loendur. Andmed salvesta tekstifaili. Kuva lehel külastuste arvu."-->
<head>
    <meta charset="utf-8">
    <title>Külastajate Loendur</title>    
</head>
<body>
    <div>
        
        <?php
        
        
        
        
            if(!filesize("count.txt")){
                $visitors = 0;
            }else{
           
            $file = fopen("count.txt", "r");  //praegune külastajate arv
            $visitors = fread($file, filesize("count.txt"));
            }
            
        ?>
        
          
        <p>Sellel lehel on olnud külastajaid juba: <?php echo $visitors;?> tükki</p>
        <?php session_destroy();?>
    
    </div>
    
</body>
</html>
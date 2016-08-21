<?php





?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Pane oma kell õigeks</title>
        <script>

var currentTime = new Date();
var hours = currentTime.getHours();
var minutes = currentTime.getMinutes();

var suffix = "AM";

if (hours >= 12) {
    suffix = "PM";
    hours = hours - 12;
}

if (hours == 0) {
    hours = 12;
}

if (minutes < 10) {
    minutes = "0" + minutes;
}

document.write("<div>Sinu kell on: " + hours + ":" + minutes + " " + suffix + "</div>");
            
            
</script>
    </head>
<body>
        <div>
               
            <?php 
            
             date_default_timezone_set('Estonia/Tallinn'); 

             $time = date('d/m/Y H:i:s');
             echo $time;
            
            
            ?>
    
        </div>
        
</body>
</html>
    
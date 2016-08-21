<?php

include "like_functions.php";

if(isset($_POST['submit'])){
              add_like();


}
$file = fopen("likes.txt", "r") or die("Unable to open file!");
$txt = fgets($file);
fclose($file);

    
    
echo "<p> Tänan! Lehele antud like'de arv on nüüd " . $txt .  "</p>";

?>
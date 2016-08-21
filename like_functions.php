<?php
function get_like_count(){
    
    $file = fopen("likes.txt", "r")or die("sorry, õpi veel"); 
    $likes;
    
    if(!filesize("likes.txt")){
        
        $likes = 0;
         
          
    } else {
        
                      
    $likes = fread($file, filesize("likes.txt"));
   
        
    }
    
    fclose($file);
    
    return $likes;
    
}

function add_like(){
    
    $current_likes;
    $file = fopen("likes.txt", "r")or die("Unable to open file!"); //avame faili ainult lugemismode'
    
    if(!filesize("likes.txt")){
        
           $current_likes = 0;
            fclose($file);
        
    }else{
    
                 
    $current_likes = fread($file, filesize("likes.txt")); //loeme praeguse like arvu
    
    fclose($file);
    
        
    }
    
    
    
    $txt = $current_likes + 1; //liidame 1 juurde
   
    $file = fopen("likes.txt", "w")or die("Unable to open file!"); //avame uuesti kirjutamis
    fwrite($file, $txt); //kirjutame praeguse üle

    fclose($file);
    
    
}

     


   
?>
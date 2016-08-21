<?php
   
    $connection = mysqli_connect('localhost', 'root', '', 'eksam');

        if(!$connection){
            
            echo "ühendust ei õnnestunud luua " . mysqli_error();
            
        }

function get_average(){
    
    global $connection;
    $sql = "SELECT * FROM hinne";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
    $sum = $row['antud_hinne'];
    $count = $row['hinnete_arv'];
    
    if($sum == 0 && $count == 0){
        $average = 0;
    }else{
        
    $average = $sum/$count;
    }
    
    return $average;
        
}


function add_grade(){
    
    if(isset($_POST['grade'])){
    
    global $connection;
    $get_data_sql = "SELECT * FROM hinne";
    $get_data_query = mysqli_query($connection, $get_data_sql);
    $row = mysqli_fetch_assoc($get_data_query);
    $sum = $row['antud_hinne']; //praegune hinnete summa
    $count = $row['hinnete_arv']; //praegune hindajate arv
        
    if($sum == 0 && $count == 0){
        
        $added = $_POST['grade'];
        $count = 1;
        $sql = "INSERT INTO hinne(hinnete_arv, antud_hinne) VALUES($count, $added)";
        
    } else {
    
    $added = $_POST['grade']; //hinne, mis kasutaja andis
        
    $sum = $sum + $added; //liidame summale selle juurde
         
    $count = $count + 1;  //hindajate arvule liidame 1 juurde
    
    $sql = "UPDATE hinne SET antud_hinne = $sum, hinnete_arv = $count"; 
        
    }
    
    $update_data_query = mysqli_query($connection, $sql);
                                
            echo "summa pärast " . $sum;
            echo " hinnetearv " . $count;
    
  
   }
    
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lehekülje hindamine andmebaasiga</title>    
</head>
    <body>
        
        <div>
           
        Hinda seda lehte: 
        
        <form action="" method="post">
          
        <select id="gr" name="grade">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
       </select>
            
        <input type=submit name="submit" value="Hinda">
            
        </form>
            
        <?php
            
            if(isset($_POST['submit'])){
                add_grade();
            }
            
        ?>
            
         <p>Hetkel on lehele antud keskmine hinne juba <?php echo get_average();?></p> 
        
        </div>
        <div>
            <h1>Lorem Ipsum</h1>
            "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."

            
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tristique metus at sollicitudin tempus. Praesent dapibus vitae sem et consectetur. Donec faucibus at risus ut dapibus. Donec dictum venenatis mattis. Mauris fermentum orci ex, nec lacinia erat vestibulum id. Maecenas non nibh diam. Donec rutrum euismod consequat. Cras feugiat purus eget dolor scelerisque, vitae mattis justo aliquet. Duis gravida aliquam felis eu laoreet. Aliquam id sodales diam. Cras at dolor eget nisi pharetra venenatis. Maecenas convallis leo sit amet dui interdum, ac cursus sapien gravida. Nulla facilisi.</p>
        <p>Integer eget felis tincidunt, aliquet eros eleifend, lobortis urna. Vestibulum suscipit gravida risus, eu sagittis odio consequat ac. Phasellus erat ante, consectetur sit amet porta a, blandit nec leo. Sed interdum malesuada nisi, vel tempus turpis ornare porttitor. Nam nunc neque, bibendum ac elit ut, aliquam pretium mauris. Nam scelerisque vel ligula sit amet dapibus. Integer tincidunt elementum porttitor. Vivamus eu magna et ex fermentum volutpat ut nec ipsum. Curabitur vel gravida libero, eget elementum orci.
        </p>
        <p>
        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis eu tincidunt massa. Sed pulvinar, augue non ultrices vulputate, lacus quam volutpat nulla, a aliquam lacus ex nec lorem. Cras sed porta dui, vel tristique quam. Fusce justo nisl, porttitor id congue sit amet, facilisis et est. Fusce pellentesque neque sapien, vitae rhoncus ipsum venenatis quis. Curabitur lacinia blandit odio, vitae cursus massa faucibus id. Nulla enim turpis, dictum non sapien eu, finibus eleifend odio. Maecenas accumsan leo eget lorem tempor, sit amet eleifend ante blandit.
        </p>
        
        </div>
        
    
    </body>
</html>
<?php 
       
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                   
    function get_data() { 
        $file_name='limitdata'. '.json'; 
   
        if(file_exists("$file_name")) {  
            $current_data=file_get_contents("$file_name"); 
            $array_data=json_decode($current_data, true); 
                               
            $extra=array( 
                'limit' => $_POST['limit'],
                'notes' => $_POST['notes'],
            ); 
            $array_data[]=$extra; 
            return json_encode($array_data); 
        } 
        else { 
            $datae=array(); 
            $datae[]=array( 
                'limit' => $_POST['limit'],
                'notes' => $_POST['notes'],
            ); 
            return json_encode($datae);    
        } 
    } 
  
    $file_name='limitdata'. '.json'; 
      
    if(file_put_contents("$file_name", get_data())) { 
        echo '<script>alert("Referral Request is Successfull!");
        window.location.href="../nav/myProfile.html";</script>'; 
    }                 
    else { 
        echo '<script>alert("There is some Error. Please try again later!")</script>';                  
    } 
} 
       
?> 
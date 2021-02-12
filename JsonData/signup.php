<?php 
       
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                   
    function get_data() { 
        $name = $_POST['name']; 
        $file_name='userData'. '.json'; 
   
        if(file_exists("$file_name")) {  
            $current_data=file_get_contents("$file_name"); 
            $array_data=json_decode($current_data, true); 
                               
            $extra=array( 
                'name' => $_POST['name'], 
                'username' => $_POST['username'], 
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'company' => $_POST['company'],
                'role' => $_POST['role'],
                'profilePicture' => $_POST['profilePicture'],
            ); 
            $array_data[]=$extra; 
            return json_encode($array_data); 
        } 
        else { 
            $datae=array(); 
            $datae[]=array( 
                'name' => $_POST['name'], 
                'username' => $_POST['username'], 
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'company' => $_POST['company'],
                'role' => $_POST['role'],
                'profilePicture' => $_POST['profilePicture'],
            ); 
            return json_encode($datae);    
        } 
    } 
  
    $file_name='userData'. '.json'; 
      
    if(file_put_contents("$file_name", get_data())) { 
        echo '<script>alert("Registered Successfully!");
        window.location.href="../index.html";</script>'; 
    }                 
    else { 
        echo '<script>alert("There is some Error. Please try again later!")</script>';                  
    } 
} 
       
?> 
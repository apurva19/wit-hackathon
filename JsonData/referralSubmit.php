<?php 
       
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                   
    function get_data() { 
        $name = $_POST['name']; 
        $file_name='referralTable'. '.json'; 
   
        if(file_exists("$file_name")) {  
            $current_data=file_get_contents("$file_name"); 
            $array_data=json_decode($current_data, true); 
                               
            $extra=array( 
                'name' => $_POST['name'], 
                'email' => $_POST['email'], 
                'jobId' => $_POST['jobId'], 
                'resumeLink' => $_POST['resumeLink'], 
                'message' => $_POST['message'],
            ); 
            $array_data[]=$extra; 
            return json_encode($array_data); 
        } 
        else { 
            $datae=array(); 
            $datae[]=array( 
                'name' => $_POST['name'], 
                'email' => $_POST['email'], 
                'jobId' => $_POST['jobId'], 
                'resumeLink' => $_POST['resumeLink'], 
                'message' => $_POST['message'],
            ); 
            return json_encode($datae);    
        } 
    } 
  
    $file_name='referralTable'. '.json'; 
      
    if(file_put_contents("$file_name", get_data())) { 
        echo '<script>alert("Your application is successfully submitted!");
        window.location.href="../index.html";</script>'; 
    }                 
    else { 
        echo '<script>alert("There is some Error. Please try again later!")</script>';                  
    } 
} 
       
?> 
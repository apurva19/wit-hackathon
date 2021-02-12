<?php 
       
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                   
    function get_data() { 
        $name = $_POST['name']; 
        $file_name='programsdata'. '.json'; 
   
        if(file_exists("$file_name")) {  
            $current_data=file_get_contents("$file_name"); 
            $array_data=json_decode($current_data, true); 
                               
            $extra=array( 
                'name' => $_POST['name'],
                'category' => $_POST['category'],
                'experienceRequired' => $_POST['experienceRequired'],
                'notes' => $_POST['notes'],
                'url' => $_POST['url'],
            ); 
            $array_data[]=$extra; 
            return json_encode($array_data); 
        } 
        else { 
            $datae=array(); 
            $datae[]=array( 
                'name' => $_POST['name'],
                'category' => $_POST['category'],
                'experienceRequired' => $_POST['experienceRequired'],
                'notes' => $_POST['notes'],
                'url' => $_POST['url'],
            ); 
            return json_encode($datae);    
        } 
    } 
  
    $file_name='programsdata'. '.json'; 
      
    if(file_put_contents("$file_name", get_data())) { 
        echo '<script>alert("Opportunity Posted Successfully! Thank you for your contribution!!");
        window.location.href="../nav/opportunities.html";</script>'; 
    }                 
    else { 
        echo '<script>alert("There is some Error. Please try again later!")</script>';                  
    } 
} 
       
?> 
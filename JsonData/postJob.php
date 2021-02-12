<?php 
       
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
                   
    function get_data() { 
        $name = $_POST['name']; 
        $file_name='jobsdata'. '.json'; 
   
        if(file_exists("$file_name")) {  
            $current_data=file_get_contents("$file_name"); 
            $array_data=json_decode($current_data, true); 
                               
            $extra=array( 
                'company' => $_POST['company'],
                'role' => $_POST['role'],
                'location' => $_POST['location'],
                'experienceRequired' => $_POST['experienceRequired'],
                'careerPortalLink' => $_POST['careerPortalLink'],
                'aboutTheJob' => $_POST['aboutTheJob'],
                'companyDescription' => $_POST['companyDescription'],
                'responsibilities' => $_POST['responsibilities'],
                'skillsReq' => $_POST['skillsReq'],
                'incentives' => $_POST['incentives'],
            ); 
            $array_data[]=$extra; 
            return json_encode($array_data); 
        } 
        else { 
            $datae=array(); 
            $datae[]=array( 
                'company' => $_POST['company'],
                'role' => $_POST['role'],
                'location' => $_POST['location'],
                'experienceRequired' => $_POST['experienceRequired'],
                'careerPortalLink' => $_POST['careerPortalLink'],
                'aboutTheJob' => $_POST['aboutTheJob'],
                'companyDescription' => $_POST['companyDescription'],
                'responsibilities' => $_POST['responsibilities'],
                'skillsReq' => $_POST['skillsReq'],
                'incentives' => $_POST['incentives'],
            ); 
            return json_encode($datae);    
        } 
    } 
  
    $file_name='jobsdata'. '.json'; 
      
    if(file_put_contents("$file_name", get_data())) { 
        echo '<script>alert("Job Posted Successfully!");
        window.location.href="../nav/jobs.html";</script>'; 
    }                 
    else { 
        echo '<script>alert("There is some Error. Please try again later!")</script>';                  
    } 
} 
       
?> 
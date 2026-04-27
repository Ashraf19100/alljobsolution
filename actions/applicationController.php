<?php
require_once 'database/database.php';

$applicationsubmit = new datamodel();

if(!empty($_GET['apply'])){

    $application_submit = $applicationsubmit->insertData('applications', $_POST);
    if($application_submit == true){
        print($application_submit);
    }
}else{
    if(!empty($_POST)){
    
        $user_id = $_SESSION['id'];
        
        $application_data['user_id'] = $user_id;
        foreach($_POST as $key => $val){
            $application_data[$key] = $val;
        }
        
        $condition_application = " WHERE job_id = '".$_POST['job_id']."' AND user_id ='".$_SESSION['id']."'";
        $jobapplied = $applicationsubmit->getsingleData('applications',' * ', $condition_application );

        
        if(!empty($jobapplied)){
            header("Location: ../alljobsolution/index.php?page=application&job_id=".$_POST['job_id']."&message='You have already applied for this position'");
            exit();

        }else{
            $_SESSION['application_data'] = $application_data;
            header("Location: ../alljobsolution/index.php?page=application_preview");
            exit();

        }  
    }
}
    


?>
<?php
require_once 'database/database.php';

$applicationsubmit = new datamodel();
if(!empty($_POST)){
    
    $user_id = $_SESSION['id'];
    
    $column['user_id'] = $user_id;
    foreach($_POST as $key => $val){
        $column[$key] = $val;
    }
    
    $condition_application_application = " WHERE job_id = '".$_POST['job_id']."' AND user_id ='".$_SESSION['id']."'";
    $jobapplied = $applicationsubmit->getsingleData('user_details',' * ', $condition_application );
    
    if(!empty($jobapplied)){
        header("Location: ../alljobsolution/index.php?page=&message='You have all ready applied for this poaition'");

    }else{
        $application_insert = $applicationsubmit->insertData('user_details', $column);
        header("Location: ../alljobsolution/index.php?page=application_recheck");

    }

    
}
    


?>
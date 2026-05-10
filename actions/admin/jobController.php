<?php
require_once 'database/database.php';

$admin_job = new datamodel();

if(isset($_POST)){
    
    foreach($_POST as $key => $val){
        $jobcolumn[$key] = $val;
    }
    if(isset($_POST['id'])){
    $job_condition = " WHERE id ='".$_POST['id']."'";
    $job_info = $admin_job->getData('jobs',' * ', $job_condition );
    }
    
    
    if(isset($job_info)){
        $job_result = $admin_job->updateData('jobs', $_POST, $job_condition);
        header("Location: ../alljobsolution/index.php?page=postjob&message='successfully updated'");

    }else{
        $job_result = $admin_job->insertData('jobs', $jobcolumn);
        header("Location: ../alljobsolution/index.php?page=postjob&message='successfully inserted'");

    }

    
}


?>
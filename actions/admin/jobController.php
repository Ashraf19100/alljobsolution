<?php
require_once 'database/database.php';

$admin_job = new datamodel();
if($_GET['page']=='jobedu'){
print("<pre>");

    if(isset($_POST)){ 
        foreach($_POST as $key => $val){
            if (in_array($key, [
                'ssc_allowed_exam',
                'hsc_allowed_exam',
                'gra_allowed_exam',
                'mas_allowed_exam',
                'mph_allowed_exam',
                'phd_allowed_exam',
                'ssc_allowed_sub',
                'hsc_allowed_sub',
                'gra_allowed_sub',
                'mas_allowed_sub',
                'mph_allowed_sub',
                'phd_allowed_sub'
            ])) {
                    $val =implode(', ', $_POST[$key]);  
            }
            $jobeducolumn[$key] = $val;
        }
        print_r($jobeducolumn);
        if(isset($_POST['job_code'])){
        $jobedu = " WHERE job_code ='".$_POST['job_code']."'";
        $job_manageinfo = $admin_job->getData('job_post_edu',' * ', $jobedu );
        }
        
        
        if(isset($job_manageinfo)){
            $job_manage = $admin_job->updateData('job_post_edu', $jobeducolumn, $jobedu);
            header("Location: ../alljobsolution/index.php?page=postjob&message='successfully updated'");
            exit;

        }else{
            $job_manage = $admin_job->insertData('job_post_edu', $jobeducolumn);
            header("Location: ../alljobsolution/index.php?page=postjob&message='successfully inserted the information'");
            exit;

        }  
    }
}else if($_GET['page']=='job_circular_submit'){
    
    if(isset($_POST)){
        foreach( $_POST as $k => $v){
            $col[$k] = $v;
        }
    }
    
    if(isset($_FILES)){
        if($_FILES['circular_doc']['name'] != ''){
            $fileExten = strtolower(pathinfo($_FILES['circular_doc']['name'], PATHINFO_EXTENSION));
            if($fileExten == 'pdf'){
                list($cir_doc_result , $circular_file)=$admin_job->fileupload($_FILES['circular_doc'], 'circulars');
                $col['circular_doc']=$circular_file;
                if($cir_doc_result == 0){
                    header("Location: ../alljobsolution/index.php?page=jobcirculars&message='".$circular_file."'");
                    die();
                }else{
                    $cir_upload = $admin_job->insertData('job_circulars', $col);
                    header("Location: ../alljobsolution/index.php?page=jobcirculars&message='Uploaded Successfully'");
                    die();
                }

            }else{
                header("Location: ../alljobsolution/index.php?page=jobcirculars&message='invalid file extention, only pdf file allowed'");
                die();
            }
        }
        
    }
}else{
    if(isset($_POST)){ 
        
        $_POST['description'] = str_replace("'", '', $_POST['description']);
        $_POST['requirements'] = str_replace("'", '', $_POST['requirements']);
        $_POST['comp_benifits'] = str_replace("'", '', $_POST['comp_benifits']);
        
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

}
?>
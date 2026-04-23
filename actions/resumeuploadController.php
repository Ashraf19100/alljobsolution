<?php

require_once 'database/database.php';
$resumes = new datamodel();
$skills = new datamodel();
$condition = " WHERE user_id ='".$_SESSION['id']."'";
$resumeinfo = $resumes->getData('resumes', ' * ', $condition);
$skill_list = $skills->getData('skills', ' * ', '');



if(!isset($resumeinfo)){
    $user_id = $_SESSION['id'];
    $column['user_id'] = $user_id;
}

if(isset($_POST)){   
    if(!empty($_POST)){
    $all_skills = implode(',', $_POST['skills']);
    $column['skills'] = $all_skills;
    }
    
    if(isset($_FILES)){
        foreach($_FILES as $pdf){   
            foreach($pdf as $k => $v ){
                
                $resumepdf[$k] = $v;

            }
        }
    }
    

    if($resumepdf['name']!=''){
        
        list($resumepdfresult , $resumepdffile)=$resumes->fileupload($resumepdf, 'resume');
        $column['file_path'] = $resumepdffile;
        if($resumepdfresult == 0){
            header("Location: ../alljobsolution/index.php?page=profileinfo&message='".$resumepdffile."'");
            die();
        }
    }
    
    if(isset($resumeinfo)){
        $result = $resumes->updateData('resumes', $column, $condition);
        header("Location: ../alljobsolution/index.php?page=resumeupload&message='successfully updated'");

    }else{
        $result = $resumes->insertData('resumes', $column);
        header("Location: ../alljobsolution/index.php?page=resumeupload&message='successfully inserted'");

    }

    
}


?>
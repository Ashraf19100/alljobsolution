<?php
require_once 'database/database.php';
require_once 'validator/validation.php';

$educationinfo = new datamodel();
$validation_edu = new Validation();

if(isset($_POST)){
    
    $user_id = $_SESSION['id'];
    $updateCheck = $educationinfo->getSingleData('user_education', ' * ', ' WHERE user_id ='. $user_id . " and exam_level=". $_POST['exam_level']);
    
    
    if(intval($_POST['exam_level']) > 1 ){
        
        $validate_edu=$validation_edu->ExamValidate($user_id, $_POST['exam_level'], $_POST['passing_year']);
        if($validate_edu['result'] ==  false){
            header("Location: ../alljobsolution/index.php?page=educationalinfo&message=".$validate_edu['message']);
            exit;
        }
    }
     
    
    $column['user_id'] = $user_id;
    foreach($_POST as $key => $val){
        $column[$key] = $val;
    }


    if(!empty($updateCheck)){
        
        $result = $educationinfo->updateData('user_education', $column, ' WHERE id='.$updateCheck->id);
        if(isset($result)){
            header("Location: ../alljobsolution/index.php?page=educationalinfo&message='successfully updated'");
            exit;
        }    
    }
    $result = $educationinfo->insertData('user_education', $column);
    if(isset($result)){
        header("Location: ../alljobsolution/index.php?page=educationalinfo&message='successfully inserted'");
        exit;
    }

    

    
}
    


?>
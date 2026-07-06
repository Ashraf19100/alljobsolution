<?php
require_once 'database/database.php';

$centerroomController = new datamodel();

if($_POST){
    
    $check_rooms = $centerroomController->getSingleData('exam_rooms', '*',' Where center_id='.$_POST['center_id']);
    if(!empty($check_rooms)){
        foreach($_POST as $k => $v){
            if($k != 'center_id'){
                if($v!=''){
                $centercol[$k] = $v;
                }
            }
        }
        $update_center_rooms = $centerroomController->updateData('exam_rooms', $centercol, ' Where center_id='.$_POST['center_id']);
        header("Location: ../alljobsolution/index.php?page=rooms&message='successfully updated the information'");
        exit;    
    }else{
        $add_center_rooms = $centerroomController->insertData('exam_rooms', $_POST);
        header("Location: ../alljobsolution/index.php?page=rooms&message='successfully inserted the information'");
        exit;
    }
    
    
}
if(isset($_GET['delete'])){
    $delete_rooms = $centerroomController->deleteData('exam_rooms', $_GET['delete']);
    header("Location: ../alljobsolution/index.php?page=rooms&message='successfully Deleted the information'");
    exit;
}


?>
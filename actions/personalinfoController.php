<?php
require_once 'database/database.php';

$personalinfo = new datamodel();
if(isset($_POST)){
    
    $user_id = $_SESSION['id'];
    
    $column['user_id'] = $user_id;
    foreach($_POST as $key => $val){
        $column[$key] = $val;
    }
    
    $condition = " WHERE user_id ='".$_SESSION['id']."'";
    $user_info = $personalinfo->getData('user_details',' * ', $condition );
    if(isset($user_info)){
        $result = $personalinfo->updateData('user_details', $_POST, $condition);
        header("Location: ../alljobsolution/index.php?page=personalinfo&message='successfully updated'");

    }else{
        $result = $personalinfo->insertData('user_details', $column);
        header("Location: ../alljobsolution/index.php?page=personalinfo&message='successfully inserted'");

    }

    
}
    


?>
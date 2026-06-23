<?php
require_once 'database/database.php';

$admin_user = new datamodel();

if($_POST){
    foreach($_POST as $k => $v){
        if($k != 'id'){
            if( $k != 'tab'){
            $col[$k] = $v; 
            }
        }
    }
    if($_POST['tab']=='action_permission'){
        $update_action = $admin_user->getSingleData($_POST['tab'], 'id' , " WHERE id=".$_POST['id']);
        if(!empty($update_action)){
            $update_role = $admin_user->updateData($_POST['tab'], $col , " WHERE id=".$_POST['id']);
            header("Location:../alljobsolution/index.php?page=showuser&actvui=".$_POST['id']."&message=successfully updated ");
            exit;
        }else{
            $col['user_id'] = $_POST['id'];
            $update_role = $admin_user->insertData($_POST['tab'], $col );
            header("Location:../alljobsolution/index.php?page=showuser&actvui=".$_POST['id']."&message=successfully updated ");
            exit;
        }
    }else{
        $update_role = $admin_user->updateData($_POST['tab'], $col , " WHERE id=".$_POST['id']);
        header("Location:../alljobsolution/index.php?page=showuser&actvui=".$_POST['id']."&message=successfully updated ");
        exit;
    }
    
}

?>
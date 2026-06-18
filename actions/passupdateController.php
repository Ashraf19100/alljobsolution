<?php
require_once 'database/database.php';
require_once 'validator/validation.php';

$updatepass = new datamodel();

$oldusrcheck = $updatepass->getSingleData('users', 'id', " WHERE id =".$_POST['id']);

if(!$oldusrcheck){
    header("Location: ../alljobsolution/index.php?page=login&message=Something went wrong please provide right email id");
    exit;      
}else{
    if($_POST){
        $passwordValidate = $validation->passwordValidation($_POST['password']);
        if($passwordValidate['result'] == false){
            $query = http_build_query($passwordValidate);
            header("Location: ../alljobsolution/index.php?page=reset-password&$query");
            exit;   
        }
        if($_POST['password'] == $_POST['confirm_password']){
            foreach($_POST as $key => $val){
            if($key =='password' ){
                $col[$key] = md5($val);
            }
            }
            $setnewpass = $updatepass->updateData('users', $col, " WHERE id =".$_POST['id']);
            if($setnewpass){
                header("Location: ../alljobsolution/index.php?page=login&message=password updated successfully");
                exit;  
            }
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message=Password doesnot matched");
            exit;
        }
        
    }
}

?>

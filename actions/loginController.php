<?php
require_once 'database/database.php';

$login = new datamodel();
if(isset($_POST)){
    $i=count($_POST);
    $condition =" WHERE ";
    $count=0;
    foreach($_POST as $key => $val){
        if($key == 'password'){
            $val= md5($val);
        }
        $condition .= $key . "=" ."'". $val ."'" ;
        $count ++;
        if($i != $count){
            $condition .=' and ';
        }
        
    }
    $result = $login->getData('users',' * ',$condition);
    
    if(isset($result)){
        session_start();
        foreach($result as $row){
            foreach($row as $key => $val){
                $_SESSION[$key]=$val;
            }
        }
        header("Location: ../alljobsolution/index.php?page=dashboard");
        exit;
        
    }
    
}
    


?>
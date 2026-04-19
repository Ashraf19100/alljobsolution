<?php
require_once 'database/database.php';

$educationinfo = new datamodel();

if(isset($_POST)){
    
    $user_id = $_SESSION['id'];
    
    $column['user_id'] = $user_id;
    foreach($_POST as $key => $val){
        $column[$key] = $val;
    }
    
    
    
    $result = $educationinfo->insertData('user_education', $column);
    if(isset($result)){
        header("Location: ../alljobsolution/index.php?page=educationalino&message='successfully inserted'");
    }

    

    
}
    


?>
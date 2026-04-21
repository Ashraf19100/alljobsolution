<?php
require_once 'database/database.php';

$experienceinfo = new datamodel();

if(isset($_POST)){
    
    $user_id = $_SESSION['id'];
    
    $column['user_id'] = $user_id;
    foreach($_POST as $key => $val){
        $column[$key] = $val;
    }
    
    
    
    $result = $experienceinfo->insertData('user_experience', $column);
    if(isset($result)){
        header("Location: ../alljobsolution/index.php?page=experience&message='successfully inserted'");
        exit;

    }

    

    
}
    


?>
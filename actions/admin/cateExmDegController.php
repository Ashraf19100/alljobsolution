<?php
require_once 'database/database.php';

$jobcategory = new datamodel();
if($GET['page']='addcategory'){
    if(isset($_POST)){ 
            $categoryaction = $jobcategory->insertData('category', $_POST);
            header("Location: ../alljobsolution/index.php?page=jobcategory&message='successfully inserted the information'");
            exit;

    }
}



?>
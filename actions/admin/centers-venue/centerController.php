<?php
require_once 'database/database.php';

$centerController = new datamodel();

if($_POST){
    $add_centers = $centerController->insertData('exam_centers', $_POST);
    header("Location: ../alljobsolution/index.php?page=centers&message='successfully inserted the information'");
    exit;
}
if(isset($_GET['delete'])){
    $delete_centers = $centerController->deleteData('exam_centers', $_GET['delete']);
    header("Location: ../alljobsolution/index.php?page=centers&message='successfully Deleted the information'");
    exit;
}


?>
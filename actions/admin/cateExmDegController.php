<?php
require_once 'database/database.php';
$examCatdeg = new datamodel();
if($_GET['page']=='addcategory'){
    if(isset($_POST)){ 
            $categoryaction = $examCatdeg->insertData('category', $_POST);
            header("Location: ../alljobsolution/index.php?page=jobcategory&message='successfully inserted the information'");
            exit;

    }
}
if($_GET['page'] == 'addexam'){
    if(isset($_GET['delete'])){ 
        $examCatdeg->deleteData('bachelor_degrees', $_GET['delete']);        
        header("Location: ../alljobsolution/index.php?page=examanddegree&message='deleted the the row'");
        exit;
    }else{
        $adddegree = $examCatdeg->insertData('bachelor_degrees', $_POST);
        header("Location: ../alljobsolution/index.php?page=examanddegree&message='successfully inserted the information'");
        exit;
    }
}
if($_GET['page'] == 'addsubject'){
    if(isset($_GET['delete'])){ 
        $examCatdeg->deleteData('bachelor_departments', $_GET['delete']);        
        header("Location: ../alljobsolution/index.php?page=subjectDepartments&message='deleted the the row'");
        exit;
    }else{
        $adddegree = $examCatdeg->insertData('bachelor_departments', $_POST);
        header("Location: ../alljobsolution/index.php?page=subjectDepartments&message='successfully inserted the information'");
        exit;
    }
}


?>
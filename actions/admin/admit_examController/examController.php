<?php
    require_once 'database/database.php';


    $examControll = new datamodel();
    if($_POST){
        $start_time = new DateTime($_POST['start_time']);
        $end_time = new DateTime($_POST['end_time']);
        $difference =  $start_time->diff($end_time);
        $duration = $difference->format('%h houres %i minute');

        foreach($_POST as $k => $v){
            $exmcol[$k] = $v;
        }
        $exmcol['duration'] = $duration;
        $exmcol['created_by'] = $_SESSION['id'];

        $insertExam = $examControll->insertData('exams', $exmcol);
        if($insertExam){
            header("Location: ../alljobsolution/index.php?page=examManage&message='successfully Added exam for the Post ".$_POST['exam_posts_title']);
            exit;
        }
    }


?>
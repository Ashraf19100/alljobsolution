<?php
    require_once 'database/database.php';


    $setVenueControll = new datamodel();
    if($_POST){
        foreach($_POST as $k => $v){
            if($k != 'center_ids')
            {$exmvanuecol[$k] = $v;}
        }
        
        $centers_ids = implode(',', $_POST['center_ids']);
        
        
        $exmvanuecol['center_ids'] = $centers_ids;
        
        $insertExamvanue = $setVenueControll->insertData('set_exam_venue', $exmvanuecol);
        if($insertExamvanue){
            header("Location: ../alljobsolution/index.php?page=PostsExm&message='successfully Added exam for the Post&ref=".$_GET['ref']."&circular=".$_GET['circular']);
            exit;
        }
    }


?>
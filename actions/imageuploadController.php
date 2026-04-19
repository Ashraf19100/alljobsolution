<?php

require_once 'database/database.php';

$profileinfo = new datamodel();

$count =count($_FILES);

$column['phone'] = $_POST['phone'];

if(isset($_FILES)){
    foreach($_FILES as $key => $val){   
        foreach($val as $k => $v ){
                if($key == 'profile_image'){
                    $image[$k] = $v;
                }else{
                    $signature[$k] = $v;
                }
            
        }
    }
}
if($image['name']!=''){
    list($imageresult , $imagefile)=$profileinfo->fileupload($image);
    $column['profile_image'] = $imagefile;
}


if($signature['name']!=''){
    list($signatureresult , $signaturefile)=$profileinfo->fileupload($signature);
    $column['signature'] = $signaturefile;

}
if($imageresult == 0){
    header("Location: ../alljobsolution/index.php?page=profileinfo&message='".$imagefile."'");
    die();
}
if($signatureresult == 0){
    header("Location: ../alljobsolution/index.php?page=profileinfo&message='". $signaturefile ."'");
    die();
}




$condition= " WHERE id = ". $_SESSION['id'];

$profileresult =  $profileinfo->updateData('users', $column, $condition);
    if(isset($profileresult)){
        header("Location: ../alljobsolution/index.php?page=profileinfo&message='successfully updated'");
    }



?>
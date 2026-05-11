<?php

require_once 'database/database.php';

$comapnyinfo = new datamodel();
print('<pre>');
print_r($_POST);

$countcomany =count($_FILES);
print($countcomany);
foreach($_POST as $key => $val){
    $company[$key] = $val;
}
print_r($company);

if(isset($_FILES)){
    foreach($_FILES as $key => $val){   
        foreach($val as $k => $v ){
            $logo[$k] = $v;    
        }
    }
}

if($logo['name']!=''){
    list($logoresult , $logofile)=$comapnyinfo->fileupload($logo, 'organisations');
    $company['logo'] = $logofile;
    if($logoresult == 0){
        header("Location: ../alljobsolution/index.php?page=companyList&message='".$logofile."'");
        die();
    }
}
if(isset($_GET['cmp_i'])){
    $condition= " WHERE id = '". $_GET['cmp_i']."'";
    $check_company = $comapnyinfo->getSingleData('companies',' * ', $condition );
}

if(isset($check_company)){
        $cmpresult = $comapnyinfo->updateData('companies', $company, $condition);
        header("Location: ../alljobsolution/index.php?page=companyList&message='successfully updated'");

}else{
        $cmpresult = $comapnyinfo->insertData('companies', $company);
        

        header("Location: ../alljobsolution/index.php?page=companyList&message='successfully inserted'");

}





?>
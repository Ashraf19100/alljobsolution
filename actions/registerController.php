<?php
require_once 'database/database.php';
require_once 'validator/validation.php';


$validation = new validation();
$register = new datamodel();
// email validation
$emailValidate=$validation->emailValidation($_POST['email']);
if($emailValidate['result'] == false){
    $query = http_build_query($emailValidate);
    header("Location: ../alljobsolution/index.php?page=register&$query");
    exit;
}
// name validation
$nameValidate = $validation->nameValidation($_POST['name']);
if($nameValidate['has_number'] == true || $nameValidate['has_special_character'] == true){
    header("Location: ../alljobsolution/index.php?page=register&message=Name must not contain any number or special Character");
    exit;
}
// password validation
$passwordValidate = $validation->passwordValidation($_POST['password']);
if($passwordValidate['result'] == false){
    $query = http_build_query($passwordValidate);
    header("Location: ../alljobsolution/index.php?page=register&$query");
    exit;   
}

$result = $register->insertData('users', $_POST);

if(isset($result)){
    header("Location: ../alljobsolution/index.php?page=login");
    exit;
}

?>
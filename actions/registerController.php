<?php
require_once '../database/database.php';

$register = new datamodel();
print_r($_POST);
$result = $register->insertData('users', $_POST);

if(isset($result)){
    header("Location: ../view/login.php");
}

?>
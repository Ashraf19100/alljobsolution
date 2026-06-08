<?php
require_once '../database/database.php';
$emailcheckmodel = new datamodel();
$email = $_GET['email'];

$data = $emailcheckmodel->getSingleData(
    'users',
    ' * ',
    " WHERE email = '".$email."'"
);

header('Content-Type: application/json');

echo json_encode($data);
?>
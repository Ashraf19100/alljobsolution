<?php
require_once '../database/database.php';

session_start();
$usr_id = $_SESSION['id'];
$exm_lvl = intval($_GET['exam_level']);


$educationinfo = new datamodel();

$data = $educationinfo->getSingleData(
    'user_education',
    '*',
    ' WHERE user_id='.$usr_id.' AND exam_level='.$exm_lvl
);

header('Content-Type: application/json');

echo json_encode($data);
?>
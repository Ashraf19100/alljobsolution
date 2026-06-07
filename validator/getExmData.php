<?php
require_once '../database/database.php';
$examDatamodel = new datamodel();
session_start();
$usr_id = $_SESSION['id'];
$exm_lvl = intval($_GET['exam_level']);
$prevExamLevel = $exm_lvl - 1;

$educationinfo = new datamodel();

$data = $educationinfo->getSingleData(
    'user_education',
    '*',
    ' WHERE user_id='.$usr_id.' AND exam_level='.$prevExamLevel
);

header('Content-Type: application/json');

echo json_encode($data);
?>
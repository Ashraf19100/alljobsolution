<?php
require_once '../database/database.php';
$actionPermit = new datamodel();
$id = $_GET['id'];

$data = $actionPermit->actionPermit($id);

header('Content-Type: application/json');

echo json_encode($data);
?>
<?php
require_once 'database/database.php';

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to login page
header("Location: ../alljobsolution/index.php?page=login&message='you are loged Out'");
exit();

?>
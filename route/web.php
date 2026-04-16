<?php

$page = $_GET['page'] ?? 'home';

switch ($page) {

    case 'login':
        require_once 'view/login.php';
        break;

    case 'register':
        require_once 'view/register.php';
        break;

    case 'login-submit':
        require_once 'actions/loginController.php';
        break;

    case 'register-submit':
        require_once 'actions/registerController.php';
        break;

    case 'dashboard':
        require_once 'view/dashboard.php';
        break;

    default:
        require_once 'view/home.php'; // you can create this
        break;
}
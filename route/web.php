
<?php 
session_start();

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
        if(isset($_SESSION['email'])){
        require_once 'view/dashboard.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
    case 'personalinfo':
        require_once 'view/personalinfo.php';
        break;
    case 'personalinfo-submit':
        require_once 'actions/personalinfoController.php';
        break;
    case 'education-submit':
        require_once 'actions/educationinfoController.php';
        break;
    case 'educationalinfo':
        require_once 'view/educationalinfo.php';
        break;
    case 'profileinfo':
        require_once 'view/imageupload.php';
        break;
    case 'imageupload-submit':
        require_once 'actions/imageuploadController.php';
        break;
    case 'resumeupload':
        require_once 'view/resume.php';
        break;
    case 'resumeupload-submit':
        require_once 'actions/resumeuploadController.php';
        break;
    case 'logout':
        require_once 'actions/logoutController.php';
        break;
        

    default:
        require_once 'view/home.php'; 
        break;
}

                
?>
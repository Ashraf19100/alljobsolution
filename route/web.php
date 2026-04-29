
<?php 
require_once 'actions/pdfController.php';

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
        if(isset($_SESSION['email'])){
        require_once 'view/personalinfo.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'personalinfo-submit':
        if(isset($_SESSION['email'])){
        require_once 'actions/personalinfoController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'education-submit':
        if(isset($_SESSION['email'])){
        require_once 'actions/educationinfoController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'educationalinfo':
        if(isset($_SESSION['email'])){
        require_once 'view/educationalinfo.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'experience':
        if(isset($_SESSION['email'])){
        require_once 'view/experience.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'experience-submit':
        if(isset($_SESSION['email'])){
        require_once 'actions/experienceController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
       
        // 
    case 'profileinfo':
        if(isset($_SESSION['email'])){
        require_once 'view/imageupload.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'imageupload-submit':
        if(isset($_SESSION['email'])){
        require_once 'actions/imageuploadController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'jobdetails':
        if(isset($_SESSION['email'])){
        require_once 'view/jobdetails.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'application':
        if(isset($_SESSION['email'])){
        require_once 'view/application.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'application_submit':
        if(isset($_SESSION['email'])){
        require_once 'actions/applicationController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    
    case 'application_preview':
        if(isset($_SESSION['email'])){
        require_once 'view/application_preview.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'resumeupload':
        if(isset($_SESSION['email'])){
        require_once 'view/resume.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
        
    case 'resumeupload-submit':
        if(isset($_SESSION['email'])){
        require_once 'actions/resumeuploadController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }
    case 'pdf':
        if(isset($_SESSION['email'])){
        $controller = new PdfController();
        $controller->generate($_GET['user_id']);
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=login&message='please login first'");
            exit;
        }    
    case 'logout':
        require_once 'actions/logoutController.php';
        break;
        

    default:
        require_once 'view/home.php'; 
        break;
}

                
?>
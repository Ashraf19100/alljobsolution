
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
    case 'forgetpassword':
        require_once 'view/passwordtoken.php';
        break;
    case 'pass-token':
        require_once 'actions/passrestController.php';
        break;
    case 'reset-password':
        require_once 'view/resetPassword.php';
        break;
    case 'newpassset':
        require_once 'actions/passupdateController.php';
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
    case 'jobspercircular':
        if(isset($_SESSION['email'])){
        require_once 'view/AllPosts/jobbycircular.php';
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
    case 'application_download':
        if(isset($_SESSION['email'])){
        require_once 'view/application_download.php';
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
    case 'userslist':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/users/userlist.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'roleaction':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/useractionController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'showuser':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/users/showuser.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'companyList':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/company/companylist.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'showcompany':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/company/showcompany.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'addcompany':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/companyController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'postjob':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/jobpost/jobpostupload.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'jobpostmanage':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/jobpost/jobpostmanage.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'jobcirculars':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/jobpost/job_circulars.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'jobpost_upload_submit':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/jobController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'job_circular_submit':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/jobController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'applications':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/applications/applications.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'jobcategory':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/category/jobcategory.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'addcategory':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/cateExmDegController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'examanddegree':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/examanddegree/examname.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'subjectDepartments':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/examanddegree/subjectDepartments.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        } 
    case 'jobedu':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/jobController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'addexam':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/cateExmDegController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }
    case 'getexm':
        require_once 'validator/getExmData.php';
        break;
    case 'addsubject':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'actions/admin/cateExmDegController.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }    
    case 'examManage':
        if(isset($_SESSION['email']) && $_SESSION['role']!='job_seeker'){
        require_once 'view/admin/Admit_exam_manage/exam.php';
        break;
        }else{
            header("Location: ../alljobsolution/index.php?page=&message=''");
            exit;
        }        
    case 'logout':
        require_once 'actions/logoutController.php';
        break;
        

    default:
        require_once 'view/home.php'; 
        break;
}

// application_download getexm 

                
?>
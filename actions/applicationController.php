<?php
require_once 'database/database.php';
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

$applicationsubmit = new datamodel();
 function applicationgenerate($user_id) {
        // Load your models
        $userModel = new datamodel();
        // Load HTML template
        ob_start();
        include 'view/application_download.php';
        $html = ob_get_clean();

        // Generate PDF
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->set('isRemoteEnabled', true); 
        $options->set('chroot', realpath('')); // Allows access to local directories
        $dompdf->setOptions($options);


        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream("application.pdf", ["Attachment" => 1]);
    }

if(!empty($_GET['apply'])){

    $application_submit = $applicationsubmit->insertData('applications', $_POST);
    if($application_submit == true){
        header("Location: ../alljobsolution/index.php?page=application_download&ji=".$_GET['apply']."&message='applied successfully'&u_i=".$_POST['user_id']);
        exit();
        
    }
}else if(!empty($_GET['download'] )){
    applicationgenerate($_GET['download']);
}
else{
    if(!empty($_POST)){
    
        $user_id = $_SESSION['id'];
        
        $application_data['user_id'] = $user_id;
        foreach($_POST as $key => $val){
            $application_data[$key] = $val;
        }
        
        $condition_application = " WHERE job_id = '".$_POST['job_id']."' AND user_id ='".$_SESSION['id']."'";
        $jobapplied = $applicationsubmit->getsingleData('applications',' * ', $condition_application );

        
        if(!empty($jobapplied)){
            header("Location: ../alljobsolution/index.php?page=application&job_id=".$_POST['job_id']."&message='You have already applied for this position'");
            exit();

        }else{
            $_SESSION['application_data'] = $application_data;
            header("Location: ../alljobsolution/index.php?page=application_preview");
            exit();

        }  
    }
}
    


?>
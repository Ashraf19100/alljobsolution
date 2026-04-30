<?php 
require_once 'vendor/autoload.php';
require_once 'database/database.php';

use Dompdf\Dompdf;

class PdfController {

    public function generate($user_id) {

        // Load your models
        $userModel = new datamodel();

        $data = [
            'personal'   => $userModel->getSingleData('user_details',' * ', ' WHERE user_id ='.$user_id),
            'education'  => $userModel->getSingleData('user_education',' * ', ' WHERE user_id ='.$user_id),
            'experience' => $userModel->getSingleData('user_experience',' * ', ' WHERE user_id ='.$user_id),
        ];

        // Load HTML template
        ob_start();
        extract($data);
        include 'view/CV_template.php';
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

        $dompdf->stream("resume.pdf", ["Attachment" => 0]);
    }
}
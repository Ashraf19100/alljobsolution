<?php
require_once 'database/database.php';
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$passreset = new datamodel();

$email = $_POST['email'];


$resetusers = $passreset->getSingleData('users' , ' * ' , " WHERE email ='".$email."'");

if($resetusers){
    $token = bin2hex(random_bytes(32));
    $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $column['pass_reset_token'] = $token;
    $column['pass_token_exp'] = $expires;
    
    $setToken = $passreset->updateData('users', $column, " WHERE email ='".$email."'");

     $link = "http://localhost/alljobsolution/index.php?page=reset-password&token=".$token;

    // Send email
    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'teletalkoffice88@gmail.com';
        $mail->Password = 'qpjc anvr upep ibvt';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('teletalkoffice88@gmail.com', 'All Job Solution');
        $mail->addAddress($email);

        $mail->Subject = 'Password Reset';

        $mail->Body =
            "Click the link below to reset your password:\n\n"
            .$link;

        $mail->send();

        echo "Reset link sent.";

    } catch (Exception $e) {

        echo "Email failed: ".$mail->ErrorInfo;

    }
}

echo "<h3 class='text-center text-dark'>An Email has been sent to <span class='text-danger '>".$email."</span>> </h3>";


?>
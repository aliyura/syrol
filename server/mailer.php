<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
header("Access-Control-Allow-Origin: *");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'template.php';

// Instantiation and passing `true` enables exceptions

class Mailer{
    
    static function send($receivers,$topic,$cc,$subject,$attachments,$body){

        try {
            $mail = new PHPMailer(true);
            $templater = new Template();

            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'mail.syrol.org';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'management@syrol.org';                     // SMTP username
            $mail->Password   = 'Syrol@1994';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('management@syrol.org', 'Syrol Technologies');
            $receiversBase = explode(',', $receivers);
            #preoare receivers
            foreach ($receiversBase as $recever){
                if($recever!=null){
                  $mail->addAddress($recever, $topic);     // Add a recipient
                  $mail->addReplyTo($recever, $topic);
                }
            }
            #prepare cc
            $ccBase = explode(',', $cc);
            foreach ($ccBase as $cc){
                $mail->addCC($cc);
            }
            #set attachement if availble
            if($attachments != null){
                foreach ($attachments as $attachment){
                    $mail->addAttachment($attachment);
                } 
            }
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $templater -> generate($receivers,$topic,$cc,$subject,$body);

            $mail->send();
            
            //delete attachements after mail is sent
            if($attachments != null){
                foreach ($attachments as $attachment){
                    if (!unlink($attachment)) {  
                        echo ("$file_pointer cannot be deleted due to an error");  
                    }
                } 
            }
            // 
            
            return 1;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return 0;
        }
    }
}
?>
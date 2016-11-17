<?php
namespace App\Services\EmailSender;

use App\Framework\Config;

class EmailSender
{

    private static $phpMailer;

    public function __construct() {

    }

    /**
     * OpenSSL PHP extension is needed!
     * @param $config
     * @param $email
     * @param $subject
     * @param $message
     * @return int
     */
    public function send( $config, $email, $subject, $message ) {

        if( !self::$phpMailer ) {

            $mail = new \PHPMailer;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output
            $mail->SMTPSecure = "ssl";
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = $config->get('smtp.host');  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $config->get('smtp.user');                 // SMTP username
            $mail->Password = $config->get('smtp.password');                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = $config->get('smtp.port');                                    // TCP port to connect to

            $mail->isHTML(true);                                  // Set email format to HTML


            self::$phpMailer = $mail;
        }
        else {
            $mail = self::$phpMailer;
        }

        $mail->setFrom('dev-team@best-auction.com', 'Dev Team');
        $mail->addAddress($email);               // Name is optional

        $mail->Subject = $subject;
        $mail->Body    = '<div style="padding:20px;background:lightgrey;border:solid 2px black;border-radius:10px;">
                            <p>Dear user,</p>
                            <p>This message for you:</p>
                            <p><b>'.$message.'</b></p>
                            <p>Thank you, Auction Team</p>
                            </div>';

        if(!$mail->send()) {
            return 0;
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            return 1;
            echo 'Message has been sent';
        }
    }

}
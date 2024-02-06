<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mailer
{
    public function orderMail($title, $content, $mail_order)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'utf-8';

        try {
            // Thiết lập máy chủ
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'longbt300820@gmail.com';
            $mail->Password = 'hcez swav bgwr niha';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // or ENCRYPTION_STARTTLS
            $mail->Port = 465;

            // Người nhận
            $mail->setFrom('longbt300820@gmail.com', 'My G-Store');
            $mail->addAddress($mail_order);

            // Nội dung
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $content;

            $mail->send();

            // Return a success status
            return true;
        } catch (Exception $e) {
            // Log the error or handle it as needed
            // Return a failure status
            return false;
        }
    }
}

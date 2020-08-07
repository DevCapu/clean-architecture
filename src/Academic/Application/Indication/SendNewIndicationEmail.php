<?php

namespace Devcapu\Arquitetura\Academic\Application\Indication;

use Devcapu\Arquitetura\Academic\Domain\Student\Student;
use http\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once(__DIR__ . '/../../../config/email_password.php');



class SendNewIndicationEmail implements SendIndicationEmail
{
    public function sendTo(Student $indicatedStudent): bool
    {
        $PHPMailer = new PHPMailer(true);
        try {
            $PHPMailer->SMTPDebug = 1;
            $PHPMailer->isSMTP();
            $PHPMailer->Host = 'smtp.gmail.com';
            $PHPMailer->SMTPAuth = true;
            $PHPMailer->Username = 'felipe.b2014';
            $PHPMailer->Password = EMAIL_PASSWORD;
            $PHPMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $PHPMailer->Port = 587;

            $PHPMailer->setFrom('felipe.b2014@gmail.com', 'Felipe Moreno');

            $PHPMailer->addAddress($indicatedStudent->email(), $indicatedStudent->name());

            $PHPMailer->isHTML(true);
            $PHPMailer->Subject = 'Here is the subject';
            $PHPMailer->Body = 'This is the HTML message body <b>in bold!</b>';
            $PHPMailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

            return $PHPMailer->send();
        } catch (Exception $exception) {
            echo 'Message could not be sent';
            return false;
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 09.03.2018
 * Time: 19:55
 */

namespace controller;


use lib\Controller;
use model\Message;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController extends  Controller
{
    public function __construct()
    {
        $this->model = new Message( $this->getDB() );
    }

    public function indexAction()
    {
        if (!@$_POST['send']) {
           return null;
        }

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $this->model->addMessage([$name, $email, $message]);
        $this->setFlash("Message added!");


        if ($this->sendEmail($name, $email, $message)) {
            $this->redirect('/21/web/contact');
        }


    }

    private function sendEmail($name, $email, $message)
    {
        $name    = htmlspecialchars($name);
        $email   = htmlspecialchars($email);
        $message = htmlspecialchars($message);


        $mailer = new PHPMailer(true);

        try {
            $mailer->isSMTP();

            $mailer->SMTPAuth = true;
            $mailer->SMTPDebug = 0;


            $mailer->Host = 'smtp.gmail.com';

            $mailer->SMTPSecure = 'ssl';
            $mailer->Port = 465;

            $mailer->SMTPSecure = 'tls';
            $mailer->Port = 587;

            $u = 'phpacademy0711@gmail.com';
            $p = 'phpacademy0711+';

            $mailer->Username = $u;
            $mailer->Password = $p;

            $mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );


            $mailer->setFrom('vlasukn@mail.ru', 'nick');
            $mailer->addReplyTo('replyto@example.com', 'First Last');

            $mailer->addAddress('phpacademy0711@gmail.com', 'php-class');

            $mailer->Subject = "New Contact Message";
            $mailer->Body = <<<BODY
Name: $name
Email: $email
Message: $message
BODY;
;
            $mailer->AltBody = 'This is a plain-text message body';

            return $mailer->send();


        } catch (\Exception $e) {

            $this->setFlash($e->getMessage());
        }
    }

}

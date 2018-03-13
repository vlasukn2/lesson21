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
        $this->redirect('/21/web/contact');
    }

}

<?php
namespace controller;
use lib\Controller;

/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 27.02.2018
 * Time: 19:38
 */

class PageController extends Controller
{
    public function staticAction($params = [])
    {
        $id = $params['id'];

        $path = "../view/pages/$id.php";
        if (!file_exists($path)) {
            throw new \Exception("File '$path' doesn't exist.");
        }

//        return file_get_contents($path);
        ob_start();
        include $path;
        $result = ob_get_clean();

        return $result;
    }

    public function indexAction()
    {
        $this->data['message'] = 'Hello world';

//        return 'adsfasd/fasdf.php';
    }
}
<?php
namespace controller;
use lib\Controller;
use model\Page;

/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 27.02.2018
 * Time: 19:38
 */

class PageController extends Controller
{
    public function __construct()
    {
        $this->model = new Page( $this->getDB() );
    }

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

    public function testAction()
    {
        $this->data['message'] = 'Hello world';

        $db = $this->getDB();
    }

    public function indexAction()
    {
        $this->data['pages'] = $this->model->getAllPages();
    }

    public function viewAction()
    {
        if (!$alias = @$this->params[0]) {
            throw new \Exception("No alias provided");
        }

        $this->data['page'] = $this->model->getPageByAlias($alias);
    }
}
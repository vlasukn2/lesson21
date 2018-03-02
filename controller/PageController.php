<?php
namespace controller;
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 27.02.2018
 * Time: 19:38
 */

class PageController
{
    public function staticAction($params = [])
    {
        $id = $params['id'];

        $path = "../view/pages/$id.php";
        if (!file_exists($path)) {
            throw new \Exception("File '$path' doesn't exist.");
        }

        return file_get_contents($path);
    }
}
<?php
namespace lib;
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 27.02.2018
 * Time: 19:37
 */

class Router
{
    protected $controller;
    protected $action;
    protected $params = [];

    public function parseUrl($uri)
    {
//        list($a, $b) = ['hello', 'world'];
        list($this->controller, $this->action) = explode('/', $uri['r']);
        $this->params = $uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public static function redirect($url, $code = 302)
    {
        header("Location: " . $url, true, $code);
        exit();
    }

}
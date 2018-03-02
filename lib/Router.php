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
    private $controller;
    private $action;
    private $params;

    public function parseUrl($uri)
    {
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

}
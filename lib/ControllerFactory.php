<?php
/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 16.03.2018
 * Time: 20:03
 */

namespace lib;


class ControllerFactory
{
    public function createController($router)
    {
        $controllerName = ucfirst($router->getController()) . 'Controller';
        $controllerName = "controller\\$controllerName";

        return  new $controllerName();
    }
}
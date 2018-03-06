<?php
namespace lib;

/**
 * Created by PhpStorm.
 * User: n.vlasuk
 * Date: 27.02.2018
 * Time: 20:41
 */
class App
{
    public function __construct()
    {
        Config::set('routes', [
            'default' => '',
            'admin'   => 'admin_',
        ]);
    }

    public function run($params)
    {
//        $router = new Router();
        $router = new UriRouter();

        $router->parseUrl($params);

        $controllerName = ucfirst($router->getController()) . 'Controller';
        $actionName     = $router->getAction() . 'Action';
        $params         = $router->getParams();

        $controllerName = "controller\\$controllerName";

        $controller = new $controllerName();
        return $controller->$actionName($params);
    }
}
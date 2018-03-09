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
        set_exception_handler(function($e){
            echo "<div style='color: red;'>{$e->getMessage()}</div>";
            die;
        });

        require '../config/config.php';
    }

    public function run($params)
    {
//        $router = new Router();
        $router = new UriRouter();

        $router->parseUrl($params);

        $controllerName = ucfirst($router->getController()) . 'Controller';
        $actionName     = $router->getAction() . 'Action';
//        $params         = $router->getParams();


        LangFiles::getInstance()->load( $router->getLang() );


        $controllerName = "controller\\$controllerName";

        /** @var Controller $controller */
        $controller = new $controllerName();
        $path = $controller->$actionName();



        $innerView = new View( $router->getController(), $router->getAction() );
        $innerData = $controller->getData();
//        $innerData['lang'] = $lang;
        $content = $innerView->render($innerData, $path);


        $view = new View();
        $data = ['content' => $content];

        return $view->render($data, "../view/{$router->getRoute()}.php" );
    }
}

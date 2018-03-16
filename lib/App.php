<?php
namespace lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

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
        $logger = new Logger('file_log');
        $logger->pushHandler(new StreamHandler('C:\xampp\htdocs\21\log\log.txt', Logger::WARNING));


        set_exception_handler(function($e) use ($logger) {
            $logger->err($e->getMessage());
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

        $actionName     = $router->getPrefix() . $router->getAction() . 'Action';
//        $params         = $router->getParams();


        LangFiles::getInstance()->load( $router->getLang() );

        /** @var Controller $controller */
        $controller = (new ControllerFactory())->createController($router);


        $controller->setParams( $router->getParams() );
        $path = $controller->$actionName();



        $innerView = new View( $router->getController(), $router->getPrefix() . $router->getAction() );
        $innerData = $controller->getData();
//        $innerData['lang'] = $lang;
        $content = $innerView->render($innerData, $path);


        $view = new View();
        $data = ['content' => $content];

        return $view->render($data, "../view/{$router->getRoute()}.php" );
    }
}

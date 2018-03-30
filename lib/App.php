<?php
namespace lib;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Twig_Environment;
use Twig_Loader_Filesystem;

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

//        return $this->buildOldView($router, $controller, $path);
        return $this->buildNewView($router, $controller);
    }

    /**
     * Build view in old way
     * @param $router
     * @param $controller
     * @param $path
     * @return string
     * @throws \Exception
     */
    public function buildOldView($router, $controller, $path)
    {

        $viewBuilder = new ViewBuilder();
        $innerView = $viewBuilder
            ->setRouter($router)
            ->getView()
        ;


        $innerData = $controller->getData();
//        $innerData['lang'] = $lang;
        $content = $innerView->render($innerData, $path);


        $view = (new ViewBuilder())->getView();
        $data = ['content' => $content];

        return $view->render($data, "../view/{$router->getRoute()}.php" );
    }

    /**
     * @param Router $router
     * @return string
     */
    public function buildNewView(Router $router, $controller)
    {
        $loader = new Twig_Loader_Filesystem('C:\xampp\htdocs\21\view_twig');
        $twig = new Twig_Environment($loader, array(
            'cache' => 'C:\xampp\htdocs\21\cache',
        ));

        $fileName = $router->getController() . '/' . $router->getAction();

        $data = $controller->getData();
        $data['flash'] = getFlash();

        return $twig->render("$fileName.twig", $data);
    }
}

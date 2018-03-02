<?php
use lib\App;
use lib\Router;
use controller\PageController;

//define('ROOT', realpath(__DIR__ . '/../'));

require "../lib/autoload.php";

//include '../lib/App.php';
//include '../lib/Router.php';
//include '../controller/PageController.php';

$params = $_GET;

$app = new App();
$output = $app->run($params);
echo $output;




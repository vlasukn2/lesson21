<?php
use lib\App;
use lib\Router;
use controller\PageController;


require "../lib/autoload.php";
require "../lib/functions.php";
session_start();

$params = $_GET;
$params = $_SERVER['REQUEST_URI'];

$app = new App();
$output = $app->run($params);
echo $output;




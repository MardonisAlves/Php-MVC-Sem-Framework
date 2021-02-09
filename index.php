<?php
// exibir todos os errors
ini_set('display_errors', 1);
ini_set('log_errors', 1);
//ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
use Bookstore\Core\Router;
use Bookstore\Core\Request;
use Bookstore\Core\Config;
use Monolog\Logger;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Monolog\Handler\StreamHandler;
use Bookstore\Utils\DependencyInjector;


require_once __DIR__.'/vendor/autoload.php';

$config = new Config();
$dbConfig = $config->get('db');
$db = new PDO(
	'mysql:host=localhost;dbname=bookstore',
	$dbConfig['user'],
	$dbConfig['password']);


$loader = new FilesystemLoader('./src/views');
$view = new Environment($loader);



$di = new DependencyInjector();
$di->set('PDO', $db);
$di->set('Utils\Config', $config);
$di->set('Environment', $view);



$router = new Router($di);
$response = $router->router(new Request());
echo $response;






















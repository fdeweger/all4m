<?php
require '../vendor/autoload.php';

$app = new \Silex\Application();
$app['debug'] = true;

$router = new \All4m\Components\Router\Router(new \All4m\Components\Router\NamespacedControllerActionTranslator());
$routes = $router->parseFromFile(__DIR__ . "/../routes.yml");
$router->applyToApp($app, $routes);
$app->run();
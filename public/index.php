<?php
require __DIR__ . '/../All4m/bootstrap.php';


$app = new \Silex\Application();
$app['config'] = $config;
$app['debug'] = $config['debug'];
$app['em'] = $entityManager;

$router = new \All4m\Components\Router\Router(new \All4m\Components\Router\NamespacedControllerActionTranslator());
$routes = $router->parseFromFile(__DIR__ . "/../config/routes.yml");
$router->applyToApp($app, $routes);
$app->run();
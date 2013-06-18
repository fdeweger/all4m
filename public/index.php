<?php
/**
 * Uncomment this line to use config-dev.yml as config file, handy for bootstrap.php in unit testing
 */
//$environment = "dev";
require __DIR__ . '/../All4m/bootstrap.php';

$app = new \Silex\Application();
$app['config'] = $config;
$app['debug'] = $config['debug'];

$router = new \All4m\Components\Router\Router(new \All4m\Components\Router\NamespacedControllerActionTranslator());
$routes = $router->parseFromFile(__DIR__ . "/../config/routes.yml");
$router->applyToApp($app, $routes);
$app->run();
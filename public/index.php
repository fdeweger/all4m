<?php
/**
 * Uncomment this line to use config-dev.yml as config file, handy for bootstrap.php in unit testing
 */
//$environment = "dev";
require __DIR__ . '/../All4m/bootstrap.php';

$app = new \Silex\Application();
$app['config'] = $config;
$app['debug'] = $config['debug'];

$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_pgsql',
        'dbname' => $config['database']['database'],
        'user' => $config['database']['username'],
        'password' => $config['database']['password'],
        'host' => $config['database']['hostname']
    ),
));


$router = new \All4m\Components\Router\Router(new \All4m\Components\Router\NamespacedControllerActionTranslator());
$routes = $router->parseFromFile(__DIR__ . "/../config/routes.yml");
$router->applyToApp($app, $routes);
$app->run();
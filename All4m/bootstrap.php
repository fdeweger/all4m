<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 12:23 PM
 * To change this template use File | Settings | File Templates.
 */

require __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

if (!isset($environment)) {
    $filename = __DIR__ . '/../config/config.yml';
} else {
    $filename = __DIR__ . '/../config/config-' . $environment . '.yml';
}

if (!file_exists($filename)) {
    throw new Exception('Configfile ' . $filename . ' doesn\'t exist');
}

$parser = new \Symfony\Component\Yaml\Yaml();
$config = $parser->parse(file_get_contents($filename));

if (!isset($config['debug'])) {
    $config['debug'] = false;
}

$pimple = new Pimple();

$pimple['config'] = $config;

if ($config['database']) {
    $dbConfig = Setup::createAnnotationMetadataConfiguration(array(__DIR__. "/Entity/"), $config['debug']);

    $connection = array(
        'driver' => 'pdo_pgsql',
        'dbname' => $config['database']['database'],
        'user' => $config['database']['username'],
        'password' => $config['database']['password'],
        'host' => $config['database']['hostname']
    );

    $pimple['em'] = $pimple->share(function() use ($connection, $dbConfig) {
        return EntityManager::create($connection, $dbConfig);
    });
}

if ($config['monolog']) {
    $provider = new \All4m\Components\Provider\MonologProvider();
    $provider->register($pimple, $config['monolog']);
}

\All4m\Components\Container::set($pimple);





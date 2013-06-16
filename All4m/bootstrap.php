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

$parser = new \Symfony\Component\Yaml\Yaml();
$config = $parser->parse(file_get_contents(__DIR__ . '/../config/config.yml'));

if (!isset($config['debug'])) {
    $config['debug'] = false;
}

$dbConfig = Setup::createAnnotationMetadataConfiguration(array(__DIR__. "/Entity/"), $config['debug']);

$connection = array(
    'driver' => 'pdo_pgsql',
    'dbname' => $config['database']['database'],
    'user' => $config['database']['username'],
    'password' => $config['database']['password'],
    'host' => $config['database']['hostname']
);

$entityManager = EntityManager::create($connection, $dbConfig);


<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 12:23 PM
 * To change this template use File | Settings | File Templates.
 */

require __DIR__ . '/../vendor/autoload.php';

use All4m\Components\Scraper\Filter\ArtistFilter;
use All4m\Components\Scraper\Filter\TitleFilter;
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
    $pimple['em'] = $pimple->share(function() use ($config) {
        $proxyDir = null;
        if (isset($config['database']['proxydir'])) {
            $proxyDir = $config['database']['proxydir'];
        }

        $dbConfig = Setup::createAnnotationMetadataConfiguration(array(__DIR__. '/Entity/'), $config['debug'], $proxyDir);

        $connection = array(
            'driver' => $config['database']['driver'],
            'dbname' => $config['database']['database'],
            'user' => $config['database']['username'],
            'password' => $config['database']['password'],
            'host' => $config['database']['hostname']
        );
        return EntityManager::create($connection, $dbConfig);
    });
}

if ($config['monolog']) {
    $provider = new \All4m\Components\Provider\MonologProvider();
    $provider->register($pimple, $config['monolog']);
}

$defaultFilters = array();
$defaultFilters[] = new ArtistFilter('justin bieber');
$defaultFilters[] = new ArtistFilter('nicky minaj');
$defaultFilters[] = new ArtistFilter('nicki minaj');
$defaultFilters[] = new ArtistFilter('k3');
$defaultFilters[] = new ArtistFilter('kabouter plop');
$defaultFilters[] = new ArtistFilter('sunclub');
$defaultFilters[] = new ArtistFilter('anwb');
$defaultFilters[] = new TitleFilter('last christmas');
$pimple['default.filters'] = $defaultFilters;

if (isset($config['session_videos'])) {
    $pimple['default.session_videos'] = $config['session_videos'];
} else {
    $pimple['default.session_videos'] = 15;
}

if (isset($config['urls'])) {
    foreach ($config['urls'] as $name => $url) {
        $key = 'urls.' . $name;
        $pimple[$key] = $url;
    }
}

\All4m\Components\Container::set($pimple);





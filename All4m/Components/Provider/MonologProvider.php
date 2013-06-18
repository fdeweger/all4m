<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 1:26 AM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Provider;


use Monolog\Logger;

class MonologProvider implements ServiceProviderInterface
{
    public function register(Pimple $pimple, array $config)
    {
        $pimple['logger'] = $pimple->share(function() use ($config) {
            if (isset($config['name'])) {
                $name = $config['name'];
            } else {
                $name = 'log';
            }

            $logger = new Logger($name);

            foreach($config['handlers'] as $key => $handlerConfig) {
                if (false === strpos($handlerConfig['type'], '_')) {
                    $className = ucfirst($handlerConfig['type'])
                } else {
                    
                }
                $logger->pushHandler()
            }
        });
    }

}
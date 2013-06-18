<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 1:26 AM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Provider;


use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\ChromePHPHandler;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class MonologProvider implements ServiceProviderInterface
{
    public function register(\Pimple $pimple, array $config)
    {
        $pimple['logger'] = $pimple->share(function() use ($config) {
            if (isset($config['name'])) {
                $name = $config['name'];
            } else {
                $name = 'log';
            }

            $logger = new Logger($name);

            if (!isset($config['handlers'])) {
                return $logger;
            }

            foreach ($config['handlers'] as $key => $handlerConfig) {
                if (isset($handlerConfig['level'])) {
                    $level = $this->getLogLevel($handlerConfig['level']);
                } else {
                    $level = Logger::DEBUG;
                }

                if ('stream' === $handlerConfig['type']) {
                    $handler = new StreamHandler($handlerConfig['filename'], $level);
                } else if ('chrome' == $handlerConfig['type']) {
                    $handler = new ChromePHPHandler();
                } else if (null === $handlerConfig['type']) {
                    $handler = new NullHandler();
                }

                if (isset($handlerConfig['formatter'])) {
                    $formatter = new $handlerConfig['formatter']();
                    $handler->setFormatter($formatter);
                }

                $logger->pushHandler($handler);
            }

            if (!isset($config['processors'])) {
                return $logger;
            }

            foreach ($config['processors'] as $processor) {
                $logger->pushProcessor(new $processor());
            }

            return $logger;
        });
    }

    private function getLogLevel($level)
    {
        switch($level)
        {
            case 'debug' :
                return Logger::DEBUG;
            case 'info' :
                return Logger::INFO;
            case 'notice' :
                return Logger::NOTICE;
            case 'warning' :
                return Logger::WARNING;
            case 'error' :
                return Logger::ERROR;
            case 'critical' :
                return Logger::CRITICAL;
            case 'alert' :
                return Logger::ALERT;
            case 'emergency' :
                return Logger::EMERGENCY;
            default :
                return Logger::DEBUG;
        }
    }
}
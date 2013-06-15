<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/15/13
 * Time: 7:21 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Router;

use Symfony\Component\Yaml;
use Silex\Application;

class Router
{
    /**
     * @var ActionTranslatorInterFace
     */
    private $translator;

    /**
     * @param ActionTranslatorInterFace $translator
     */
    function __construct(ActionTranslatorInterFace $translator = null)
    {
        if (null === $translator) {
            $translator = new DummyTranslator();
        }
        $this->translator = $translator;
    }


    /**
     * @param string $yml
     * @param string $prefix
     * @return Route[]
     * @throws RouteException
     */
    public function parse($yml, $prefix = '')
    {
        $parser = new Yaml\Parser($yml);
        $yml = $parser->parse($yml);

        $routes = array();
        foreach ($yml as $name => $route) {
            if (isset($route['method']) && isset($route['pattern']) && isset($route['action'])) {
                $action = $this->translator->translateAction(($route['action']));
                $routes[] = new Route($route['method'], $prefix . $route['pattern'], $action, $name);
            } else {
                throw new RouteException('Route' . $name . ' is does not contain all required fields.');
            }
        }

        return $routes;
    }

    /**
     * @param string $filename
     * @param string $prefix
     * @return Route[]
     */
    public function parseFromFile($filename, $prefix = '')
    {
        return $this->parse(file_get_contents($filename), $prefix);
    }

    /**
     * @param Application $app
     * @param Route[] $routes
     */
    public function applyToApp(Application $app, array $routes)
    {
        foreach ($routes as $route) {
            $method = $route->getMethod();
            $app->$method($route->getPattern(), $route->getAction())->bind($route->getName());
        }
    }
}
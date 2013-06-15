<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/15/13
 * Time: 8:26 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Router;


class Route
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $name;

    /**
     * @param string $method
     * @param string $pattern
     * @param string $action
     * @param string $name
     * @throws RouteException
     */
    function __construct($method, $pattern, $action, $name)
    {
        if (!in_array($method, $this->getAllowedMethods())) {
            throw new RouteException($method . " is not an allowed method.");
        }

        $this->method = $method;
        $this->pattern = $pattern;
        $this->action = $action;
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    private function getAllowedMethods()
    {
        return array('get', 'post', 'put', 'delete', 'match');
    }
}
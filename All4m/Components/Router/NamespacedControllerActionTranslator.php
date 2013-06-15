<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/15/13
 * Time: 8:44 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Router;


class NamespacedControllerActionTranslator implements ActionTranslatorInterface
{
    public function translateAction($action)
    {
        $namespaceEnd = strrpos($action, '\\');
        if (false === $namespaceEnd)
        {
            throw new RouteException('Action is not in form Namespace\\namespace\\Class::method');
        }

        $namespace = substr($action, 0, $namespaceEnd);
        $controller = substr($action, $namespaceEnd);

        $controller = explode('::', $controller);

        if (2 != count($controller) || '' == $controller[1]) {
            throw new RouteException('Action is not in form Namespace\\namespace\\Class::method');
        }

        return $namespace . "\\Controller"  . $controller[0] . "Controller::" . $controller[1];
    }
}
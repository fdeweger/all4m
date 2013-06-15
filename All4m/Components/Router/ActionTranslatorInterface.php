<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/15/13
 * Time: 8:42 PM
 * To change this template use File | Settings | File Templates.
 */
namespace All4m\Components\Router;

interface ActionTranslatorInterface
{
    /**
     * @param string $action
     * @return string
     */
    public function translateAction($action);
}
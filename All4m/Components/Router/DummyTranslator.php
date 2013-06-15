<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/15/13
 * Time: 11:15 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Router;


class DummyTranslator implements ActionTranslatorInterface
{
    /**
     * @param string $action
     * @return string
     */
    public function translateAction($action)
    {
        return $action;
    }

}
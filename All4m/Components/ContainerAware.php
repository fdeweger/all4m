<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 12:20 AM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components;


trait ContainerAware 
{
    private $pimple;

    protected function get($key)
    {
        if (null === $this->pimple) {
            $this->pimple = Container::getContainer();
        }
        return $this->pimple[$key];
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 1:23 AM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Provider;


interface ServiceProviderInterface
{
    public function register(Pimple $pimple, array $config);
}
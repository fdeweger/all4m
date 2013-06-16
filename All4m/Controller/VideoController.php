<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 11:51 AM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Controller;


use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class VideoController
{
    public function next(Request $request, Application $app)
    {
        echo "Next";
    }

    public function previous(Request $request, Application $app)
    {
        echo "Previous";
    }

    public function flag(Request $request, Application $app, $id)
    {
        echo "Flag " . $id;
    }
}
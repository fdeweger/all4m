<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/15/13
 * Time: 7:29 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Controller;


use All4m\Components\ContainerAwareTrait;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController {
    public function index(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig', array(
            'name' => "frank",
        ));
    }
}
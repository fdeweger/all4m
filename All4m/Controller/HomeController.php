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
    use ContainerAwareTrait;

    public function index(Request $request, Application $app)
    {
        return $app['twig']->render('index.html.twig', array('id' => 0, 'cachebust' => $this->get('cachebust')));
    }

    public function play(Request $request, Application $app, $id)
    {
        $em = $this->get('em');
        $track = $track = $em->getRepository('\All4m\Entity\Track')->find($id);
        
        return $app['twig']->render('index.html.twig',
            array(
                'id' => $id,
                'artist' => $track->getArtist(),
                'title' => $track->getTitle(),
                'youtubeId' => $track->getYoutubeId(),
                'cachebust' => $this->get('cachebust')
        ));
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 11:51 AM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Controller;


use All4m\Components\ContainerAwareTrait;
use All4m\Entity\Track;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class VideoController
{
    use ContainerAwareTrait;

    public function next(Request $request, Application $app)
    {
        $previous = $app['session']->get('previous');

        if (!is_array($previous)) {
            $previous = array();
        }

        $em = $this->get('em');
        $track = $em->getRepository('\All4m\Entity\Track')->getNext($previous, $app['db']);
        $this->handleTrack($app, $track, $em);
        return $this->trackResponse($app, $track);
    }

    public function flag(Request $request, Application $app, $id)
    {
        $previous = $app['session']->get('previous');

        $flags = $app['session']->get('flags');
        if (!$flags) {
            $flags = 1;
        } else {
            $flags++;
        }
        $app['session']->set('flags', $flags);

        $plays = $app['session']->get('plays');

        if ($this->canFlag($plays, $flags)) {
            if (is_array($previous) && $previous[0] == $id) {
                $em = $this->get('em');
                $track = $em->getRepository('\All4m\Entity\Track')->find($id);
                $track->setFlags($track->getFlags() + 1);
                $em->persist($track);
                $em->flush();
            }
        }

        $subRequest = Request::create('/video/next', 'GET');
        return $app->handle($subRequest, HttpKernelInterface::SUB_REQUEST);
    }

    public function getTrack(Request $request, Application $app, $id)
    {
        $em = $this->get('em');
        $track = $em->getRepository('\All4m\Entity\Track')->find($id);
        $this->handleTrack($app, $track, $em);
        return $this->trackResponse($app, $track);
    }

    private function handleTrack(Application $app, Track $track, $em)
    {
        $track->setViews($track->getViews() + 1);
        $em->persist($track);
        $em->flush();

        $previous = $app['session']->get('previous');

        if (!is_array($previous)) {
            $previous = array();
        }

        $previousCount = array_unshift($previous, $track->getId());

        if ($previousCount > $this->get('default.session_videos')) {
            $previous = array_slice($previous, 0, $this->get('default.session_videos'));
        }

        $app['session']->set('previous', $previous);
        $plays = $app['session']->get('plays');
        if (!$plays) {
            $plays = 1;
        } else {
            $plays++;
        }
        $app['session']->set('plays', $plays);
    }

    private function trackResponse($app, $track)
    {
        $response = new \stdClass();
        $response->id = $track->getId();
        $response->artist = $track->getArtist();
        $response->title = $track->getTitle();
        $response->youtubeId = $track->getYoutubeId();

        /**
         * DEBUG
         */
        $response->ratio = $app['session']->get('flags') / $app['session']->get('plays');
        $response->flags = $app['session']->get('flags');

        return $app->json($response);
    }

    private function canFlag($plays, $flags) {
        if ($plays < 5 && $flags < 3) {
            return true;
        }

        if ($flags > 15) {
            return false;
        }

        if (($flags / $plays) < 0.12) {
            return true;
        }

        return false;
    }
}
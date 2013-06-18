<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 4:51 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


use All4m\Components\ContainerAwareTrait;
use All4m\Entity\Spot;
use All4m\Entity\Track;
use All4m\Entity\TrackInterface;

class SpotSaver
{
    use ContainerAwareTrait;

    /**
     * @param TrackInterface[] $tracks
     * @param string $source
     */
    public function save(array $tracks, $source)
    {
        $em = $this->get('em');
        $canonicalizer = new Canonicalizer();
        foreach ($tracks as $track) {
            $track = Track::FromTrackInterFace($track);
            $canonicalizer->makeCanonical($track);
            if ('' == $track->getCanonicalName()) {
                continue;
            }

            $trackAlreadyExists = $em->getRepository('\All4m\Entity\Track')->findBy(array("canonicalName" => $track->getCanonicalName()));

            if (!$trackAlreadyExists) {
                $em->persist($track);
                $em->flush();
            }

            $spot = new Spot();
            $spot->setSource($source);
            $spot->setTrack($track);
            $em->persist($spot);
            $em->flush();
        }
    }


}
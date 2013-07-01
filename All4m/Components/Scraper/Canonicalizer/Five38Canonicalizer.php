<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/29/13
 * Time: 2:37 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Canonicalizer;


use All4m\Entity\TrackInterface;

class Five38Canonicalizer implements CanonicalizerInterface
{
    public function makeCanonical(TrackInterface $track)
    {
        $artist = $track->getArtist();
        $artist = str_ireplace('QUEEN/QUEEN', 'Queen', $artist);
        $artist = str_ireplace('538 2014', '', $artist);

        $artist = preg_replace('/^\*[a-zA-Z]{2}:/', '', $artist);

        $track->setArtist($artist);

        $title = $track->getTitle();
        $title = preg_replace('/^\*[a-zA-Z]{2}:/', '', $title);

        $track->setTitle($title);
    }
}
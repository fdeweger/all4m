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
        $artist = str_ireplace('QUEEN/QUEEN', 'QUEEN', $artist);
        $artist = str_ireplace('538 2014', '', $artist);
        $track->setArtist($artist);
    }
}
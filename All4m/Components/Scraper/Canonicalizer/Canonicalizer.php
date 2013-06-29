<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 4:56 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Canonicalizer;


use All4m\Entity\Track;
use All4m\Entity\TrackInterface;

class Canonicalizer implements CanonicalizerInterface
{
    public function makeCanonical(TrackInterface $track)
    {
        $artist = strtoupper($track->getArtist());

        if (0 === strpos($artist, 'THE ')) {
            $artist = substr($artist, 4);
        }
        
        $artist = str_replace(' FEATURING ', 'FEAT', $artist);
        $artist = str_replace(' FEAT. ', 'FEAT', $artist);
        $artist = str_replace(' FT. ', 'FEAT', $artist);
        $artist = str_replace(' FT ', 'FEAT', $artist);
        $artist = str_replace('&', 'FEAT', $artist);

        $artist = preg_replace("/[^A-Z0-9]/", '', $artist);

        $title = strtoupper($track->getTitle());

        $title = str_replace('RMX', 'REMIX', $title);
        $title = str_replace('R.M.X', 'REMIX', $title);
        $title = str_replace('RADIO EDIT', '', $title);

        $title = preg_replace("/[^A-Z0-9]/", '', $title);

        if ('' != $artist && '' != $title) {
            $track->setCanonicalName($artist . $title);
        } else {
            $track->setCanonicalName('');
        }
    }
}
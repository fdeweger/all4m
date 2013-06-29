<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/29/13
 * Time: 2:31 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Canonicalizer;


use All4m\Entity\TrackInterface;

class ThreeFMCanonicalizer implements CanonicalizerInterface
{

    public function makeCanonical(TrackInterface $track)
    {
        $title = $track->getTitle();
        $title = str_ireplace('(3FM MEGAHIT)', '', $title);
        $title = str_ireplace('3FM MEGAHIT', '', $title);
        $title = str_ireplace('#SERIOUSTALENT', '', $title);
        $track->setTitle($title);
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/29/13
 * Time: 2:29 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Canonicalizer;


use All4m\Entity\TrackInterface;

interface CanonicalizerInterface
{
    public function makeCanonical(TrackInterface $track);
}
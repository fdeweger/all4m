<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 1:57 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Filter;


use All4m\Entity\TrackInterface;

interface FilterInterface
{
    /**
     * @param TrackInterface $track
     * @return bool
     */
    public function filter(TrackInterface $track);
}
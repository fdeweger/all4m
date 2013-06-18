<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 2:14 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Filter;


use All4m\Entity\TrackInterface;

class ArtistFilter implements FilterInterface
{
    /**
     * @var string
     */
    private $artist;

    /**
     * @param string
     */
    public function __construct($artist)
    {
        $this->artist = $artist;
    }
    /**
     * @param TrackInterface $track
     * @return bool
     */
    public function filter(TrackInterface $track)
    {
        return false === stripos($track->getArtist(), $this->artist);
    }
}
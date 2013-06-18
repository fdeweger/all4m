<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 2:14 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper\Filter;


use All4m\Entity\NowPlaying;
use All4m\Entity\TrackInterface;

class TitleFilter implements FilterInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @param string
     */
    public function __construct($title)
    {
        $this->title = $title;
    }
    /**
     * @param TrackInterface $track
     * @return bool
     */
    public function filter(TrackInterface $track)
    {
        return false === stripos($track->getTitle(), $this->title);
    }
}
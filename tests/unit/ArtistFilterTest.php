<?php

namespace All4mTest;


use All4m\Components\Scraper\Filter\ArtistFilter;
use All4m\Entity\Track;

class ArtistFilterTest extends \Codeception\TestCase\Test
{
    private $filter;
    public function _before()
    {
        $this->filter = new ArtistFilter("Justin Bieber");
    }

    public function testMatch()
    {
        $track = new Track();
        $track->setArtist("justin bieber");
        $this->assertEquals(false, $this->filter->filter($track));
    }
    public function testNotMatch()
    {
        $track = new Track();
        $track->setArtist("bustin jieber");
        $this->assertEquals(true, $this->filter->filter($track));
    }
}
<?php

namespace All4mTest;


use All4m\Components\Scraper\Filter\TitleFilter;
use All4m\Entity\Track;

class TitleFilterTest extends \Codeception\TestCase\Test
{
    private $filter;
    public function _before()
    {
        $this->filter = new TitleFilter("last christmas");
    }

    public function testMatch()
    {
        $track = new Track();
        $track->setTitle("Last Christmas");
        $this->assertEquals(false, $this->filter->filter($track));
    }
    public function testNotMatch()
    {
        $track = new Track();
        $track->setArtist("Chrast Listmas");
        $this->assertEquals(true, $this->filter->filter($track));
    }
}
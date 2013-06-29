<?php
use Codeception\Util\Stub;

class Five38CanonicalizerTest extends \Codeception\TestCase\Test
{
    public function testCanonicalizer()
    {
        $track = new \All4m\Entity\Track();
        $track->setArtist("*as: foo");

        $canonicalizer = new \All4m\Components\Scraper\Canonicalizer\Five38Canonicalizer();
        $canonicalizer->makeCanonical($track);

        $this->assertEquals('Foo', $track->getArtist());
    }

}
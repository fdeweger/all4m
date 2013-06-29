<?php
use Codeception\Util\Stub;

class CanonicalizerTest extends \Codeception\TestCase\Test
{
    private $can;

    protected function _before()
    {
        $this->can = new \All4m\Components\Scraper\Canonicalizer\Canonicalizer();
    }

    // tests
    public function testCanonicalizer()
    {
        $this->test('the prodigy', 'a', 'PRODIGYA');
        $this->test('theprodigy', 'a', 'THEPRODIGYA');
        $this->test('x featuring y', 'a', 'XFEATYA');
        $this->test('x feat y', 'a', 'XFEATYA');
        $this->test('x feat. y', 'a', 'XFEATYA');
        $this->test('X & Y', 'a', 'XFEATYA');
        $this->test('X ft Y', 'a', 'XFEATYA');
        $this->test('aéb', 'a', 'ABA');
        $this->test('long name here', 'a', 'LONGNAMEHEREA');

        $this->test('a', 'rmx', 'AREMIX');
        $this->test('a', 'r.m.x.', 'AREMIX');
        $this->test('a', 'Goodbye (RADIO EDIT)', 'AGOODBYE');
        $this->test('a', 'a vèry long title!', 'AAVRYLONGTITLE');

        //if one is empty, leave canonical name empty
        $this->test('', 'a', '');
        $this->test('a', '', '');
    }

    private function test($artist, $title, $expected)
    {
        $track = new \All4m\Entity\Track();
        $track->setArtist($artist);
        $track->setTitle($title);
        $this->can->makeCanonical($track);
        $this->assertEquals($expected, $track->getCanonicalName());
    }
}
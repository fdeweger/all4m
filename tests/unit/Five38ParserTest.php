<?php
namespace All4mTest;

use All4m\Components\Scraper\All4mClient;
use All4m\Components\Scraper\Five38Parser;

class Five38ParserTest extends \Codeception\TestCase\Test
{
    public function testParse()
    {
        $data = $this->getData();
        $scraper = new Five38Parser();
        $tracks = $scraper->parse($data);
        $this->assertEquals(1, count($tracks));
        $this->assertEquals('Pink', $tracks[0]->getArtist());
        $this->assertEquals('True Love', $tracks[0]->getTitle());
    }

    public function testEmptyResponse()
    {
        $data = '';
        $scraper = new Five38Parser(new All4mClient(''));
        $tracks = $scraper->parse($data);
        $this->assertEquals(0, count($tracks));
    }

    /**
     * Returns epic ugly real life data.
     *
     * @return string
     */
    private function getData()
    {
        return '
		<article class="app recent" data-app-title="Laatst gedraaid op Radio 538" data-app-id="recent" style="margin-top:40px">

			<header>
				<h1>Laatst gedraaid op 538</h1>
			</header>

			<section class="list">
				<ul>

												<li>

						<figure>
							<img src="http://content.downloadmusic.nl/cover.php?subid=112418984&portal=targetmedia">
						</figure>

						<div>
							<h2>Pink</h2>
							True Love						</div>

														<a data-target="fullscreen" class="download" href="http://www.538downloads.nl/search.php?q=pink true love">Downloaden</a>

						</li>
												<li>

						<figure>
							<img src="/crontab/nodownload.gif">
						</figure>

						<div>
							<h2>Emeli Sande</h2>
							Read All About It Pt.iii						</div>


						</li>
												<li>

						<figure>
							<img src="http://content.downloadmusic.nl/cover.php?subid=112484897&portal=targetmedia">
						</figure>

						<div>
							<h2>Usher</h2>
							Scream						</div>

														<a data-target="fullscreen" class="download" href="http://www.538downloads.nl/search.php?q=usher scream">Downloaden</a>

						</li>

				</ul>

			</section>

			<a href="#permalink" class="canonical">recent</a>

		</article>';
    }
}
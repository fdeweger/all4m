<?php
namespace All4mTest;

use All4m\Components\Scraper\All4mClient;
use All4m\Components\Scraper\ThreeFmScraper;

class ThreeFmScraperTest extends \Codeception\TestCase\Test
{
    public function testParse()
    {
        $data = 'driefmJsonNowplaying5({"track":[{"startTime":"2013-06-16 20:25:07","endTime":"2013-06-16 20:28:43","artist":"DI-RECT","title":"THE CHASE","artistLink":"http:\/\/www.3fm.nl\/artiest\/140\/DI-RECT","songLink":"http:\/\/www.3fm.nl\/artiest\/140\/DI-RECT\/song\/62825\/THE-CHASE"},{"startTime":"2013-06-16T20:21:20+02:00","endTime":"2013-06-16T20:25:07+02:00","artist":"DISCLOSURE FT. ELIZA DOOLITTLE","title":"YOU & ME (3FM MEGAHIT)","artistLink":{},"songLink":{}},{"startTime":"2013-06-16T20:17:42+02:00","endTime":"2013-06-16T20:20:58+02:00","artist":"SNOW PATROL","title":"SHUT YOUR EYES","artistLink":"http:\/\/www.3fm.nl\/artiest\/18\/SNOW-PATROL","songLink":"http:\/\/www.3fm.nl\/artiest\/18\/SNOW-PATROL\/song\/1274\/SHUT-YOUR-EYES"},{"startTime":"2013-06-16T20:07:21+02:00","endTime":"2013-06-16T20:11:43+02:00","artist":"THICKE","title":"COPY OF BLURRED LINES (FEAT. T.I. & PHARRELL)","artistLink":{},"songLink":{}},{"startTime":"2013-06-16T19:55:57+02:00","endTime":"2013-06-16T20:00:16+02:00","artist":"ONE NIGHT ONLY","title":"JUST FOR TONIGHT","artistLink":"http:\/\/www.3fm.nl\/artiest\/3666\/ONE-NIGHT-ONLY","songLink":"http:\/\/www.3fm.nl\/artiest\/3666\/ONE-NIGHT-ONLY\/song\/4675\/JUST-FOR-TONIGHT"}]})';
        $scraper = new ThreeFmScraper(new All4mClient(''));
        $tracks = $scraper->parse($data);

        //Dammit, why does this have to be direct?
        //Terrible band, but this is a real live
        //example of 3fm output.
        $this->assertEquals(1, count($tracks));
        $this->assertEquals('DI-RECT', $tracks[0]->getArtist());
        $this->assertEquals('THE CHASE', $tracks[0]->getTitle());
    }

    public function testEmptyResponse()
    {
        $data = '';
        $scraper = new ThreeFmScraper(new All4mClient(''));
        $tracks = $scraper->parse($data);
        $this->assertEquals(0, count($tracks));
    }

    public function testInvalidJson()
    {
        $data = 'driefmJsonNowplaying5({"track":"startTime":"2013-06-16 20:25:07","endTime":"2013-06-16 20:28:43","artist":"DI-RECT","title":"THE CHASE","artistLink":"http:\/\/www.3fm.nl\/artiest\/140\/DI-RECT","songLink":"http:\/\/www.3fm.nl\/artiest\/140\/DI-RECT\/song\/62825\/THE-CHASE"},{"startTime":"2013-06-16T20:21:20+02:00","endTime":"2013-06-16T20:25:07+02:00","artist":"DISCLOSURE FT. ELIZA DOOLITTLE","title":"YOU & ME (3FM MEGAHIT)","artistLink":{},"songLink":{}},{"startTime":"2013-06-16T20:17:42+02:00","endTime":"2013-06-16T20:20:58+02:00","artist":"SNOW PATROL","title":"SHUT YOUR EYES","artistLink":"http:\/\/www.3fm.nl\/artiest\/18\/SNOW-PATROL","songLink":"http:\/\/www.3fm.nl\/artiest\/18\/SNOW-PATROL\/song\/1274\/SHUT-YOUR-EYES"},{"startTime":"2013-06-16T20:07:21+02:00","endTime":"2013-06-16T20:11:43+02:00","artist":"THICKE","title":"COPY OF BLURRED LINES (FEAT. T.I. & PHARRELL)","artistLink":{},"songLink":{}},{"startTime":"2013-06-16T19:55:57+02:00","endTime":"2013-06-16T20:00:16+02:00","artist":"ONE NIGHT ONLY","title":"JUST FOR TONIGHT","artistLink":"http:\/\/www.3fm.nl\/artiest\/3666\/ONE-NIGHT-ONLY","songLink":"http:\/\/www.3fm.nl\/artiest\/3666\/ONE-NIGHT-ONLY\/song\/4675\/JUST-FOR-TONIGHT"}]})';
        $scraper = new ThreeFmScraper(new All4mClient(''));
        $tracks = $scraper->parse($data);
        $this->assertEquals(0, count($tracks));
    }
}
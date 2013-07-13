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
        $this->assertEquals('The Black Eyed Peas', $tracks[0]->getArtist());
        $this->assertEquals('I GOT A FEELING', $tracks[0]->getTitle());
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
        return '{"538":{"id":"2","label":"538","title":"538","timestamp":1373737609000,"display":"track","default_station":"radio","program":{"current":"Barry\'s Weekend Vibe","image":"http:\/\/538cdn.538.nl\/data\/image\/i\/4000\/mod_media_image\/4182.h93.r93-93.0bd2d8b.jpg","link":"http:\/\/www.538.nl\/programma\/44\/barrys-weekend-vibe","next":"Straks op 538: 538 Dance Department","dj":{"name":"Barry Paf","link":"http:\/\/www.538.nl\/radio\/presentatoren\/22\/barry-paf","image":"http:\/\/538cdn.538.nl\/data\/image\/i\/4000\/mod_media_image\/4369.h93.r93-93.abeab9e.jpg"}},"tracks":[{"artist":"The Black Eyed Peas","title":"I GOT A FEELING","image":"http:\/\/538cdn.538.nl\/data\/image\/i\/0\/mod_media_image\/387.w40.96b281c.a8b3a1a.jpg","share_callback":"https:\/\/www.538.nl\/secure\/VdaLikeBundle\/Like\/like\/objectId\/692\/type\/track","timestamp":1373737609000,"time_gmt":1373737609,"link":"http:\/\/www.538.nl\/muziek\/the-black-eyed-peas\/692\/i-got-a-feeling"}],"video":{"hls":"http:\/\/82.201.53.54:1935\/livestream\/iphone538.sdp\/playlist.m3u8","rtmp":"rtmp:\/\/82.201.53.52:80\/livestream","file":"live"},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/538","file":"http:\/\/82.201.100.23\/RADIO538_WEB_AAC"}},"tv538":{"id":"3","label":"tv538","title":"tv538","timestamp":1373737618000,"display":"program","default_station":"tv","program":{"current":"Non Stop & Gemist","image":"http:\/\/538cdn.538.nl\/data\/image\/i\/2000\/mod_media_image\/2774.w93.96b281c.b67679b.jpg","link":"http:\/\/www.538.nl\/tv\/programmas\/31\/non-stop-gemist","next":"Straks op tv538: Non Stop & Gemist","dj":false},"tracks":false,"video":{"hls":"http:\/\/82.201.53.52\/livestream\/tv538\/playlist.m3u8","rtmp":"rtmp:\/\/82.201.53.52:80\/livestream","file":"tv538"},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.52:80\/livestream","file":"tv538"}},"nonstop40":{"id":"4","label":"nonstop40","title":"538 Non Stop 40","timestamp":1373737618000,"display":"program","default_station":false,"program":false,"tracks":[{"artist":"Justin Timberlake","title":"Mirrors","image":"http:\/\/538cdn.538.nl\/data\/image\/i\/4000\/mod_media_image\/4011.w40.r40-40.ec261ec.jpg","share_callback":"https:\/\/www.538.nl\/secure\/VdaLikeBundle\/Like\/like\/objectId\/271\/type\/track","timestamp":1368543275000,"time_gmt":1368543275,"link":"http:\/\/www.538.nl\/muziek\/justin-timberlake\/271\/mirrors"}],"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB02","file":"http:\/\/82.201.100.23\/WEB02-538NonStop40"}},"hitzone":{"id":"5","label":"hitzone","title":"538 Hitzone","timestamp":1373737618000,"display":"program","default_station":false,"program":false,"tracks":false,"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB11","file":"http:\/\/82.201.100.23\/WEB11_WEB_AAC"}},"53l8":{"id":"6","label":"53l8","title":"53L8","timestamp":1373737618000,"display":"program","default_station":false,"program":false,"tracks":false,"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB21","file":"http:\/\/82.201.100.23\/WEB21-53L8"}},"dancedepartment":{"id":"7","label":"dancedepartment","title":"538 Dance Department","timestamp":1373737618000,"display":"program","default_station":false,"program":false,"tracks":false,"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB01","file":"http:\/\/82.201.100.23\/WEB01-538Dancedepartment"}},"partyradio":{"id":"8","label":"partyradio","title":"538 Party","timestamp":1373737618000,"display":"program","default_station":false,"program":{"current":"538 Party","image":"http:\/\/538cdn.538.nl\/data\/image\/i\/0\/mod_media_image\/501.h93.r93-93.00685a4.jpg","link":"http:\/\/www.538.nl\/radio\/programmas\/51\/538-party","next":false,"dj":false},"tracks":false,"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB16","file":"http:\/\/82.201.100.23\/WEB16_WEB_AAC"}},"538nl":{"id":"9","label":"538nl","title":"538 NL","timestamp":1373737618000,"display":"program","default_station":false,"program":false,"tracks":false,"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB06","file":"http:\/\/82.201.100.23\/WEB06_WEB_AAC"}},"538ibiza":{"id":"10","label":"538ibiza","title":"538 Ibiza","timestamp":1373737618000,"display":"program","default_station":false,"program":false,"tracks":false,"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB19","file":"http:\/\/82.201.100.23\/WEB19_WEB_AAC"}},"zomertop1000":{"id":"11","label":"zomertop1000","title":"538 Zomer Top 1000","timestamp":1373737618000,"display":"program","default_station":false,"program":false,"tracks":false,"video":{"hls":"","rtmp":"","file":""},"audio":{"hls":"","rtmp":"rtmp:\/\/82.201.53.8:80\/WEB23","file":"http:\/\/82.201.100.23\/WEB23_WEB_AAC"}}}';
    }
}
<?php
use Codeception\Util\Stub;

class QMusicParserTest extends \Codeception\TestCase\Test
{
    public function testQMusicParser()
    {
        $parser = new \All4m\Components\Scraper\QMusicParser();
        $tracks = $parser->parse($this->getData());

        $this->assertEquals(1, count($tracks));
        $track = $tracks[0];
        $this->assertEquals('ILSE DELANGE', $track->getArtist());
        $this->assertEquals('So Incredible', $track->getTitle());
    }

    private function getData()
    {
        return '
  <section id="main" role="main" class="clearfix">
    <div id="main-inner" class="inner">

      <section id="content" role="content" class="clearfix">

        <div class="region region-content-top clearfix">
  <section id="block-menu-block-1" class="block block-menu-block">


  <div class="content">
    <div class="menu-block-wrapper menu-block-1 menu-name-main-menu parent-mlid-0 menu-level-1">
  <ul class="menu"><li class="first last expanded active-trail menu-mlid-666 menu-666  menu-muziek"><a href="/muziek" title="" class="active-trail">Muziek</a><ul class="menu"><li class="first leaf active-trail active menu-mlid-3786 menu-3786  menu-welkliedjewasdat"><a href="/muziek/playlist" title="" class="active-trail active">Welk liedje was dat?</a></li>
<li class="leaf menu-mlid-7725 menu-7725  menu-top500vanhetfouteuur"><a href="/top500vanhetfouteuur" title="">Top 500 van het Foute Uur</a></li>
<li class="leaf menu-mlid-7808 menu-7808  menu-5cdboxfouteuur"><a href="/nieuws/nog-meer-foute-muziek-haal-de-5cd-box-huis" title="">5 cd-box Foute Uur</a></li>
<li class="leaf menu-mlid-7711 menu-7711  menu-itunestop30"><a href="/itunes-top-30" title="">iTunes Top 30</a></li>
<li class="leaf menu-mlid-3788 menu-3788  menu-muziekoverzicht"><a href="/muziek" title="">Muziekoverzicht</a></li>
<li class="leaf menu-mlid-3787 menu-3787  menu-theqube"><a href="/muziek/qube" title="">the Qube</a></li>
<li class="last leaf menu-mlid-3791 menu-3791  menu-archief"><a href="/muziek/archief" title="">Archief</a></li>
</ul></li>
</ul></div>
  </div>

</section> <!-- /.block -->
</div>
 <!-- /.region -->

        <div class="content-system">
          <!--
									<div id="breadcrumb">
						<h2 class="element-invisible">You are here</h2><nav class="breadcrumb"><a href="/">Home</a></nav>					</div>
								-->


          <a id="main-content"></a>

												           	            <div id="title">
              	                <h1 class="title"><span class="nav-arrows"><a href="/muziek/playlist?day=2013-06-28" class="nav-arrow-prev active">Prev</a><a href="/muziek/playlist?day=2013-06-30" class="nav-arrow-next active">Next</a></span>Zaterdag 29.06</span></h1>
                          </div>
            					        </div>



        <div class="region region-content clearfix">
  <section id="block-system-main" class="block block-system">


  <div class="content">
    <div id="q-music-playlist">
  <div class="q-music-playlist-block node-61327">
	<h2><a href="/node/61327">Wim van Helden</a></h2>
  <h5>14:00 - 18:00</h5>
  <div class="item-list"><ul><li id="0" class="first last"><div class="q-list-songs q-list-songs-multiplerows q-list-songs-rows-3"><div class="q-list-songs-inner"><article id="node-28414" class="node node-song node-promoted song_carousel clearfix">
      <a href="/song/so-incredible?q_colorbox=1" class="lightbox2" rel="lightframe[group28414|width:780px; height: 630px]" >
  <img bp_mobile_src="http://images.q-music.nl/web_song/song_list_mobile/6/fd/0e/05/22343/mzi.jhnhitkh.600x600-75.jpg" bp_tablet_p_src="http://images.q-music.nl/web_song/song_list_tablet_p/6/fd/0e/05/22343/mzi.jhnhitkh.600x600-75.jpg" bp_tablet_l_src="http://images.q-music.nl/web_song/song_list_tablet_l/6/fd/0e/05/22343/mzi.jhnhitkh.600x600-75.jpg" bp_desktop_src="http://images.q-music.nl/web_song/song_list_desktop/6/fd/0e/05/22343/mzi.jhnhitkh.600x600-75.jpg" src="/sites/all/themes/custom/goldfinger/images/q_mobile_1px.png" />    <span class="kader">
        <span class="likeable" like-type="song" like-id="28414"></span>    <span class="songinfo">
      <span class="artist">
      ILSE DELANGE        </span>
        <span class="songtitle">
        So Incredible      </span>

            <span class="played_at">
        29/06 17:51      </span>
        </span>
                  </span>
  </a>


</article>

<article id="node-43943" class="node node-song node-promoted song_carousel clearfix">
      <a href="/song/watch-out-bumaye?q_colorbox=1" class="lightbox2" rel="lightframe[group43943|width:780px; height: 630px]" >
  <img bp_mobile_src="http://images.q-music.nl/web_song/song_list_mobile/5/48/47/13/131577/artworks-000041676717-szeovz-crop.jpg" bp_tablet_p_src="http://images.q-music.nl/web_song/song_list_tablet_p/5/48/47/13/131577/artworks-000041676717-szeovz-crop.jpg" bp_tablet_l_src="http://images.q-music.nl/web_song/song_list_tablet_l/5/48/47/13/131577/artworks-000041676717-szeovz-crop.jpg" bp_desktop_src="http://images.q-music.nl/web_song/song_list_desktop/5/48/47/13/131577/artworks-000041676717-szeovz-crop.jpg" src="/sites/all/themes/custom/goldfinger/images/q_mobile_1px.png" />    <span class="kader">
        <span class="likeable" like-type="song" like-id="43943"></span>    <span class="songinfo">
      <span class="artist">
      MAJOR LAZER        </span>
        <span class="songtitle">
        Watch Out For This (Bumaye)       </span>

            <span class="played_at">
        29/06 17:48      </span>
        </span>
                  </span>
  </a>


</article>

<article id="node-24712" class="node node-song node-promoted song_carousel clearfix">
      <a href="/song/shes-so-high?q_colorbox=1" class="lightbox2" rel="lightframe[group24712|width:780px; height: 630px]" >
  <img bp_mobile_src="http://images.q-music.nl/web_song/song_list_mobile/3/67/14/7f/5903/mzi.mziaughr.600x600-75.jpg" bp_tablet_p_src="http://images.q-music.nl/web_song/song_list_tablet_p/3/67/14/7f/5903/mzi.mziaughr.600x600-75.jpg" bp_tablet_l_src="http://images.q-music.nl/web_song/song_list_tablet_l/3/67/14/7f/5903/mzi.mziaughr.600x600-75.jpg" bp_desktop_src="http://images.q-music.nl/web_song/song_list_desktop/3/67/14/7f/5903/mzi.mziaughr.600x600-75.jpg" src="/sites/all/themes/custom/goldfinger/images/q_mobile_1px.png" />    <span class="kader">
        <span class="likeable" like-type="song" like-id="24712"></span>    <span class="songinfo">
      <span class="artist">
      KURT NILSEN        </span>
        <span class="songtitle">
        She&#039;s So High      </span>

            <span class="played_at">
        29/06 17:43      </span>
        </span>
                  </span>
  </a>


</article>

<article id="node-54421" class="node node-song node-promoted song_carousel clearfix">
      <a href="/song/waves?q_colorbox=1" class="lightbox2" rel="lightframe[group54421|width:780px; height: 630px]" >
  <img bp_mobile_src="http://images.q-music.nl/web_song/song_list_mobile/7/3b/0b/66/193433/859709974996_cover.600x600-75.jpg" bp_tablet_p_src="http://images.q-music.nl/web_song/song_list_tablet_p/7/3b/0b/66/193433/859709974996_cover.600x600-75.jpg" bp_tablet_l_src="http://images.q-music.nl/web_song/song_list_tablet_l/7/3b/0b/66/193433/859709974996_cover.600x600-75.jpg" bp_desktop_src="http://images.q-music.nl/web_song/song_list_desktop/7/3b/0b/66/193433/859709974996_cover.600x600-75.jpg" src="/sites/all/themes/custom/goldfinger/images/q_mobile_1px.png" />    <span class="kader">
        <span class="likeable" like-type="song" like-id="54421"></span>    <span class="songinfo">
      <span class="artist">
      MR. PROBZ        </span>
        <span class="songtitle">
        Waves      </span>

            <span class="played_at">
        29/06 17:40      </span>
        </span>
                  </span>
  </a>


</article>

<article id="node-29781" class="node node-song node-promoted song_carousel clearfix">
      <a href="/song/chasing-sun?q_colorbox=1" class="lightbox2" rel="lightframe[group29781|width:780px; height: 630px]" >
  <img bp_mobile_src="http://images.q-music.nl/web_song/song_list_mobile/f/9d/15/85/20049/12UMGIM12508.600x600-75.jpg" bp_tablet_p_src="http://images.q-music.nl/web_song/song_list_tablet_p/f/9d/15/85/20049/12UMGIM12508.600x600-75.jpg" bp_tablet_l_src="http://images.q-music.nl/web_song/song_list_tablet_l/f/9d/15/85/20049/12UMGIM12508.600x600-75.jpg" bp_desktop_src="http://images.q-music.nl/web_song/song_list_desktop/f/9d/15/85/20049/12UMGIM12508.600x600-75.jpg" src="/sites/all/themes/custom/goldfinger/images/q_mobile_1px.png" />    <span class="kader">
        <span class="likeable" like-type="song" like-id="29781"></span>    <span class="songinfo">
      <span class="artist">
      THE WANTED        </span>
        <span class="songtitle">
        Chasing The Sun      </span>

            <span class="played_at">
        29/06 17:35      </span>
        </span>
                  </span>
  </a>


</article>';
    }

}
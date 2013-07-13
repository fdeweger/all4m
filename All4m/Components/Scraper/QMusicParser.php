<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/29/13
 * Time: 7:44 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;

/**
 * THIS CLASS IS IN ALPHA STATE. Buggy and unreliable!
 */
use All4m\Entity\NowPlaying;

class QMusicParser implements ParserInterface
{
    /**
     * @param string $data
     * @return \All4m\Entity\NowPlaying[]
     */
    public function parse($data)
    {
        $artist = array();
        preg_match('|<span class="artist">\n*(.+)</span>|', $data, $artist);
        if (!isset($artist[1])) {
            return array();
        }

        $title = array();
        preg_match('|<span class="songtitle">\n*(.+)</span>|', $data, $title);
        if (!isset($title[1])) {
            return array();
        }

        $nowPlaying = new NowPlaying();
        $nowPlaying->setArtist($artist[1]);
        $nowPlaying->setTitle($title[1]);

        return array($nowPlaying);
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return "QMU";
    }
}
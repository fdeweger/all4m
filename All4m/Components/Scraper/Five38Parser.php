<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 10:55 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


use All4m\Entity\NowPlaying;

class Five38Parser implements ParserInterface
{
    public function parse($data)
    {
        $artistStart = stripos($data, '<h2>');
        $artistEnd = stripos($data, "</h2>");

        if (false === $artistStart || false === $artistEnd) {
            return array();
        }

        $artistStart += 4;
        $titleStart = $artistEnd + 5;
        $titleEnd = stripos($data, "</div>");

        if (false === $titleEnd) {
            return array();
        }

        $artist = trim(substr($data, $artistStart, $artistEnd - $artistStart));
        $title = trim(substr($data, $titleStart, $titleEnd - $titleStart));

        $track = new NowPlaying();
        $track->setArtist($artist);
        $track->setTitle($title);

        return array($track);
    }

    public function getSource()
    {
        return "538";
    }
}
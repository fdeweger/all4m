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
        if ('' == $data) {
            return array();
        }
        $data = json_decode($data);
        if (JSON_ERROR_NONE !== json_last_error()) {
            return array();
        }

        $data = $data->{538}->tracks;
        //var_dump($data);die;
        if (0 == count($data)) {
            return array();
        }

        $data = $data[0];
        $track = new NowPlaying();
        $track->setArtist($data->artist);
        $track->setTitle($data->title);

        return array($track);
    }

    public function getSource()
    {
        return "538";
    }
}
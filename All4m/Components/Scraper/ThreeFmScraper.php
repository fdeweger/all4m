<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 10:17 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


use All4m\Entity\Track;

class ThreeFmScraper extends Scraper
{
    /**
     * @param string $data
     * @return \All4m\Entity\Track[]
     */
    public function parse($data)
    {
        $start = strpos($data, '[');
        if (false === $start) {
            return array();
        }

        $data = substr($data, $start);

        $end = strrpos($data, ']');
        if (false === $end) {
            return array();
        }

        $data = substr($data, 0, $end + 1);

        $data = json_decode($data);
        if (JSON_ERROR_NONE !== json_last_error()) {
            return array();
        }

        $track = new Track();
        $track->setArtist($data[0]->artist);
        $track->setTitle($data[0]->title);

        return array($track);
    }
}
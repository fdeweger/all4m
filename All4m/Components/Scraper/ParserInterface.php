<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 4:12 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


interface ParserInterface
{
    /**
     * @param string $data
     * @return \All4m\Entity\NowPlaying[]
     */
    public function parse($data);

    /**
     * @return string
     */
    public function getSource();
}
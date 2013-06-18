<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/18/13
 * Time: 2:57 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


use All4m\Components\ContainerAwareTrait;
use All4m\Components\Scraper\Filter\NowPlayingFilter;

class ScraperFactory
{
    use ContainerAwareTrait;

    public function getThreeFmScraper()
    {
        $client = new All4mClient($this->get('urls.3fm'));
        $filters = $this->get('default_filters');
        $filters[] = new NowPlayingFilter();
        return new Scraper($client, new ThreeFmParser(), $filters);
    }

    public function GetFive38Scraper()
    {
        $client = new All4mClient($this->get('urls.538'));
        $filters = $this->get('default_filters');
        $filters[] = new NowPlayingFilter();
        return new Scraper($client, new Five38Parser(), $filters);
    }
}
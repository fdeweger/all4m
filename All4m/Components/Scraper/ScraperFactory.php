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

class ScraperFactory
{
    use ContainerAwareTrait;

    public function getThreeFmScraper()
    {
        $client = new All4mClient($this->get('urls.3fm'));
        $filters = $this->get('default_filters');
        return new ThreeFmScraper($client, $filters);
    }
}
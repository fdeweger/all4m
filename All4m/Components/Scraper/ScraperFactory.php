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
use All4m\Components\Scraper\Canonicalizer\Canonicalizer;
use All4m\Components\Scraper\Canonicalizer\Five38Canonicalizer;
use All4m\Components\Scraper\Canonicalizer\ThreeFMCanonicalizer;
use All4m\Components\Scraper\Filter\NowPlayingFilter;

class ScraperFactory
{
    use ContainerAwareTrait;

    public function getThreeFmScraper()
    {
        $client = new All4mClient($this->get('urls.3fm'));

        $filters = $this->get('default.filters');
        $filters[] = new NowPlayingFilter();

        $canonicalizers = array();
        $canonicalizers[] = new ThreeFMCanonicalizer();
        $canonicalizers[] = new Canonicalizer();

        return new Scraper($client, new ThreeFmParser(), $filters, $canonicalizers);
    }

    public function getFive38Scraper()
    {
        $client = new All4mClient($this->get('urls.538'));

        $filters = $this->get('default.filters');
        $filters[] = new NowPlayingFilter();

        $canonicalizers = array();
        $canonicalizers[] = new Five38Canonicalizer();
        $canonicalizers[] = new Canonicalizer();

        return new Scraper($client, new Five38Parser(), $filters, $canonicalizers);
    }

    public function getQMusicScraper()
    {
        $client = new All4mClient($this->get('urls.qmu'));

        $filters = $this->get('default.filters');
        $filters[] = new NowPlayingFilter();

        $canonicalizers = array();
        $canonicalizers[] = new Canonicalizer();

        return new Scraper($client, new QMusicParser(), $filters, $canonicalizers);
    }
}
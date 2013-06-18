<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 9:06 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


abstract class Scraper
{
    /**
     * @var All4mClient
     */
    private $client;

    /**
     * @var Filter\FilterInterface[]
     */
    private $filters;

    /**
     * @param All4mClient $client
     * @param string $source
     * @param Filter\FilterInterface[]
     */
    public function __construct(All4mClient $client, array $filters = array())
    {
        $this->client = $client;
        $this->filters = $filters;
    }

    public final function scrape()
    {
        $data = $this->client->getData();
        $tracks = $this->parse($data);

        foreach ($tracks as $track) {
            $track->setSource($this->getSource());
        }

        var_dump($tracks);
        foreach ($this->filters as $filter) {
            array_filter($tracks, array($filter, "filter"));
        }

        var_dump($tracks);
    }

    /**
     * @param string $data
     * @return \All4m\Entity\NowPlaying[]
     */
    abstract public function parse($data);

    abstract protected function getSource();
}
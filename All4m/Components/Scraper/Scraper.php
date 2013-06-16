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
     * @param All4mClient $client
     * @param string $source
     */
    public function __construct(All4mClient $client)
    {
        $this->client = $client;
    }

    public final function scrape()
    {
        $data = $this->client->getData();
        $tracks = $this->parse($data);
    }

    /**
     * @param string $data
     * @return \All4m\Entity\Track[]
     */
    abstract public function parse($data);
}
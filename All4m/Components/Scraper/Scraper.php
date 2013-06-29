<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 9:06 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;


use All4m\Components\Scraper\Canonicalizer\CanonicalizerInterface;
use Symfony\Component\Yaml\Parser;

class Scraper
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
     * @var ParserInterface
     */
    private $parser;

    /**
     * @var CanonicalizerInterface[]
     */
    private $canonicalizers;

    /**
     * @param All4mClient $client
     * @param ParserInterface $parser
     * @param \All4m\Components\Scraper\Filter\FilterInterface[] $filters
     * @param CanonicalizerInterface[] $canonicalizers
     */
    public function __construct(All4mClient $client, ParserInterface $parser, array $filters = array(), $canonicalizers)
    {
        $this->client = $client;
        $this->filters = $filters;
        $this->parser = $parser;
        $this->canonicalizers = $canonicalizers;
    }

    public final function scrape()
    {
        $data = $this->client->getData();
        $tracks = $this->parser->parse($data);

        foreach ($tracks as $track) {
            $track->setSource($this->parser->getSource());
            foreach ($this->canonicalizers as $canonicalizer) {
                $canonicalizer->makeCanonical($track);
            }
        }

        foreach ($this->filters as $filter) {
            $tracks = array_filter($tracks, array($filter, "filter"));
        }

        return $tracks;
    }

    /***
     * @return string
     */
    public function getSource()
    {
        return $this->parser->getSource();
    }
}
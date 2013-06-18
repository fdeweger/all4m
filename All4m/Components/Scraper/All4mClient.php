<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 8:32 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;

use All4m\Components\ContainerAwareTrait;
use Guzzle\Http\Client;

class All4mClient
{
    use ContainerAwareTrait;

    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getData()
    {
        try {
            $client = new Client($this->url);
            $request = $client->get();
            $response = $request->send();
            return $response->getBody(true);
        } catch (\Exception $e) {
            $logger = $this->get('logger');
            $logger->warning('Failed to retrieve' . $this->url ." (" . $e->getCode() . ' : ' . $e->getMessage() . ')');
            return '';
        }
    }
}
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: frank
 * Date: 6/16/13
 * Time: 8:32 PM
 * To change this template use File | Settings | File Templates.
 */

namespace All4m\Components\Scraper;

use Guzzle\Http\Client;

class All4mClient
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getData()
    {
        $client = new Client($this->url);
        $request = $client->get();
        $request->send();
        return $request->getResponseBody();
    }
}
<?php

namespace All4mTest;

use All4m\Components\Scraper\All4mClient;

class ClientTest extends \Codeception\TestCase\Test
{
    public function testClient()
    {
        $client = new All4mClient('http://www.google.com');
        $data = $client->getData();
        $matches = preg_match_all('/google/', $data);
        $this->assertGreaterThan(0, count($matches));
    }

    public function test404()
    {
        $client = new All4mClient('http://www.google.com/akljfalkdja;lskjas;lkfdjaW');
        $data = $client->getData();
        $matches = preg_match_all('/google/', $data);
        $this->assertGreaterThan(0, count($matches));
    }

}
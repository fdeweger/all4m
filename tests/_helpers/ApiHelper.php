<?php
namespace Codeception\Module;

// here you can define custom functions for ApiGuy 

class ApiHelper extends \Codeception\Module
{
    public function seeKeyExists($key)
    {
        $response = $this->getModule('REST')->grabResponse();
        $response = json_decode($response);
        $this->assertTrue(isset($response->$key));
    }
}

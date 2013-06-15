<?php
use All4m\Components\Router\Route;

class RouteTest extends \Codeception\TestCase\Test
{
   public function testAcceptedMethods()
    {
        //throws no exception
        $route = new Route('get', 'pattern', 'action', 'name');
        $route = new Route('post', 'pattern', 'action', 'name');
        $route = new Route('put', 'pattern', 'action', 'name');
        $route = new Route('delete', 'pattern', 'action', 'name');

        $this->setExpectedException("All4m\\Components\\Router\\RouteException");
        $route = new Route('foo', 'pattern', 'action', 'name');
    }
}
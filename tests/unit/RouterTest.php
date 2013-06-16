<?php
namespace All4mTest;

use All4m\Components\Router\DummyTranslator;
use All4m\Components\Router\Router;
use Codeception\Util\Stub;
use Silex\Application;

/**
 * Class RouterTest
 * @package All4mTest
 *
 * I've tried useing a data provider instead of useing different get / post / put / delete
 * tests, but that data providers are currently not implemented in codeception and switching
 * back to raw phpunit gave fatal errors on the generated mock object. I'm not going to
 * bother for now
 */
class RouterTest extends \Codeception\TestCase\Test
{
    // tests
    public function testParse()
    {
        $router = new Router(new DummyTranslator());
        $routes = $router->parse($this->getTestYml());

        $this->assertEquals(5, count($routes));

        $route = $routes[0];
        $this->assertEquals('get', $route->getMethod());
        $this->assertEquals('/', $route->getPattern());
        $this->assertEquals('Home::index', $route->getAction());
        $this->assertEquals('home', $route->getName());

        $route = $routes[1];
        $this->assertEquals('post', $route->getMethod());
        $this->assertEquals('/comment', $route->getPattern());
        $this->assertEquals('dummydummydummy', $route->getAction());
        $this->assertEquals('addcomment', $route->getName());
    }

    public function testPrefix()
    {
        $router = new Router(new DummyTranslator());
        $routes = $router->parse($this->getTestYml(), '/myapp');
        $route = $routes[0];
        $this->assertEquals('/myapp/', $route->getPattern());
    }


    public function testGet()
    {
        $app = $this->getMockApp('get', '/', 'Home::index', 'home');
        $router = new Router(new DummyTranslator());
        $routes = $router->parse($this->getTestYml());
        $router->applyToApp($app, array($routes[0]));
    }

    public function testPost()
    {
        $app = $this->getMockApp('post', '/comment', 'dummydummydummy', 'addcomment');
        $router = new Router(new DummyTranslator());
        $routes = $router->parse($this->getTestYml());
        $router->applyToApp($app, array($routes[1]));
    }

    public function testPut()
    {
        $app = $this->getMockApp('put', '/comment', 'something', 'updatecomment');
        $router = new Router(new DummyTranslator());
        $routes = $router->parse($this->getTestYml());
        $router->applyToApp($app, array($routes[2]));
    }

    public function testDelete()
    {
        $app = $this->getMockApp('delete', '/comment/{id}', 'foobarbaz', 'deletecomment');
        $router = new Router(new DummyTranslator());
        $routes = $router->parse($this->getTestYml());
        $router->applyToApp($app, array($routes[3]));
    }

    public function testMatch()
    {
        $app = $this->getMockApp('match', '/foo', 'bar', 'idontknow');
        $router = new Router(new DummyTranslator());
        $routes = $router->parse($this->getTestYml());
        $router->applyToApp($app, array($routes[4]));
    }


    private function getTestYml()
    {
        return 'home:
    method: get
    pattern: /
    action: Home::index

addcomment:
    method: post
    pattern: /comment
    action: dummydummydummy

updatecomment:
    method: put
    pattern: /comment
    action: something

deletecomment:
    method: delete
    pattern: /comment/{id}
    action: foobarbaz

idontknow:
    method: match
    pattern: /foo
    action: bar
';
    }

    private function getMockApp($method, $pattern, $action, $name)
    {
        $controller = $this->getMock("\\Silex\\Controller", array(), array(), '', false);
        $controller->expects($this->once())
            ->method("bind")
            ->with($this->equalTo($name));

        $app = $this->getMock('\\Silex\\Application');
        $app->expects($this->once())
            ->method($method)
            ->with($this->equalTo($pattern), $this->equalTo($action))
            ->will($this->returnValue($controller));

        return $app;
    }
}


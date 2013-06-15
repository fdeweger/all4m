<?php

namespace All4mTest;

use \All4m\Components\Router\NamespacedControllerActionTranslator;

class All4mActionTranslatorTest extends \Codeception\TestCase\Test
{
    public function testTranslateAction()
    {
        $translator = new NamespacedControllerActionTranslator();
        $this->assertEquals("All4m\\test\\Controller\\HomeController::index", $translator->translateAction("All4m\\test\\Home::index"));
    }

    public function testNoNamespace()
    {
        $this->setExpectedException("All4m\\Components\\Router\\RouteException");
        $translator = new NamespacedControllerActionTranslator();
        $translator->translateAction("Home::index");
    }
    public function testNoAction()
    {
        $this->setExpectedException("All4m\\Components\\Router\\RouteException");
        $translator = new NamespacedControllerActionTranslator();
        $translator->translateAction("All4m\\test\\Homeindex");
    }

    public function testActionEmpty()
    {
        $this->setExpectedException("All4m\\Components\\Router\\RouteException");
        $translator = new NamespacedControllerActionTranslator();
        $translator->translateAction("All4m\\test\\Home::");
    }
}
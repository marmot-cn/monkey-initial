<?php
namespace {@namespaceCaps}\Controller;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

use Marmot\Core;

use {@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter;
use {@namespaceCaps}\Model\Null{@nameCaps};
use {@namespaceCaps}\Model\{@nameCaps};
use {@namespaceCaps}\View\{@nameCaps}View;

class {@nameCaps}FetchControllerTest extends TestCase
{
    private $controller;

    public function setUp()
    {
        $this->controller = $this->getMockBuilder({@nameCaps}FetchController::class)
                           ->setMethods(
                               ['getRepository', 'renderView', 'displayError']
                           )
                           ->getMock();
    }

    public function tearDown()
    {
        unset($this->controller);
    }

    public function testExtendsController()
    {
        $this->assertInstanceOf(
            'Marmot\Framework\Classes\Controller',
            $this->controller
        );
    }

    public function testImplementsIOperateController()
    {
        $this->assertInstanceOf(
            'Marmot\Framework\Common\Controller\IFetchController',
            $this->controller
        );
    }

    public function testGetRepository()
    {
        $controller = new Mock{@nameCaps}FetchController();

        $this->assertInstanceOf(
            '{@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter',
            $controller->getRepository()
        );
    }

    public function testGenerateView()
    {
        $controller = new Mock{@nameCaps}FetchController();

        $this->assertInstanceOf(
            '{@namespaceCaps}\View\{@nameCaps}View',
            $controller->generateView('')
        );
    }

    public function testGetResourceName()
    {
        $controller = new Mock{@nameCaps}FetchController();

        $this->assertEquals(
            '',
            $controller->getResourceName()
        );
    }
}

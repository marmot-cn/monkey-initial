<?php
namespace {@namespaceCaps}\Model;

use Marmot\Core;

use Prophecy\Argument;
use PHPUnit\Framework\TestCase;

class {@nameCaps}Test extends TestCase
{
    private ${@name};

    public function setUp()
    {
        $this->{@name} = new {@nameCaps}();
    }

    public function tearDown()
    {
        parent::tearDown();
        Core::setLastError(ERROR_NOT_DEFINED);
        unset($this->{@name});
    }

    public function testImplementsIObjec()
    {
    	$this->assertInstanceOf(
    		'Marmot\Common\Model\IObject',
            $this->{@name}
    	);
    }

    public function testGetRepository()
    {
        ${@name} = new Mock{@nameCaps}();
        $this->assertInstanceOf('{@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter', ${@name}->getRepository());
    }

    public function testAddSuccess()
    {
        $result = $this->{@name}->add();
        $this->assertTrue($result);
    }

    public function testEditSuccess()
    {
        $result = $this->{@name}->edit();
        $this->assertTrue($result);
    }
}
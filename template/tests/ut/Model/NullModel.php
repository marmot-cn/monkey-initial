<?php
namespace {@namespaceCaps}\Model;

use PHPUnit\Framework\TestCase;

class Null{@nameCaps}Test extends TestCase
{
    private $department;

    public function setUp()
    {
        $this->department = Null{@nameCaps}::getInstance();
    }

    public function tearDown()
    {
        unset($this->department);
    }

    public function testExtends{@nameCaps}()
    {
        $this->assertInstanceof('{@namespaceCaps}\Model\{@nameCaps}', $this->department);
    }

    public function testImplementsNull()
    {
        $this->assertInstanceof('Marmot\Interfaces\INull', $this->department);
    }
}

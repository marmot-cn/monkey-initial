<?php
namespace {@namespaceCaps}\Command\{@nameCaps};

use PHPUnit\Framework\TestCase;

/**
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 * @author chloroplast
 */
class Add{@nameCaps}CommandTest extends TestCase
{
    private $fakerData = array();
    
    private $command;
    
    public function setUp()
    {
        $this->fakerData = array(
            'id' => 10,
        );

        $this->command = new Add{@nameCaps}Command(
            $this->fakerData['id']
        );
    }
    
    /**
     * 1. 测试是否实现 ICommand
     */
    public function testImplementsCommand()
    {
        $this->assertInstanceOf('Marmot\Interfaces\ICommand', $this->command);
    }


    public function testIdParameter()
    {
        $this->assertEquals($this->fakerData['id'], $this->command->id);
    }

    public function testDefaultParameter()
    {
        $command = new Add{@nameCaps}Command();
        $this->assertEquals(0, $command->id);
    }
}
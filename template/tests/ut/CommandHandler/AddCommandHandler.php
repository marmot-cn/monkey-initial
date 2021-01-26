<?php
namespace {@namespaceCaps}\CommandHandler\{@nameCaps};

use Prophecy\Argument;
use PHPUnit\Framework\TestCase;

use Marmot\Interfaces\ICommand;

use {@namespaceCaps}\Model\{@nameCaps};
use {@namespaceCaps}\Command\{@nameCaps}\Add{@nameCaps}Command;

class Add{@nameCaps}CommandHandlerTest extends TestCase
{
    private $commandHandler;

    private $faker;

    public function setUp()
    {
        $this->commandHandler = $this->getMockBuilder(Add{@nameCaps}CommandHandler::class)
                                     ->setMethods(['get{@nameCaps}'])
                                     ->getMock();

        $this->faker = \Faker\Factory::create('zh_CN');
    }

    public function tearDown()
    {
        unset($this->commandHandler);
        unset($this->faker);
    }

    public function testCorrectImplementsICommandHandler()
    {
        $this->assertInstanceOf(
            'Marmot\Interfaces\ICommandHandler',
            $this->commandHandler
        );
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentException()
    {
        $command = new class implements ICommand {
        };
        $this->commandHandler->execute($command);
    }

    public function testGet{@nameCaps}()
    {
        $commandHandler = new MockAdd{@nameCaps}CommandHandler();
        $this->assertInstanceOf(
            '{@namespaceCaps}\Model\{@nameCaps}',
            $commandHandler->get{@nameCaps}()
        );
    }

    public function testExecuteSuccess()
    {
        $command = new Add{@nameCaps}Command(
        );
        $expectId = 10;

        ${@name} = $this->prophesize({@nameCaps}::class);
        ${@name}->getId()->shouldBeCalledTimes(1)->willReturn($expectId);
        ${@name}->add()->shouldBeCalledTimes(1)->willReturn(true);

        $this->commandHandler->expects($this->any())
            ->method('get{@nameCaps}')
            ->willReturn(${@name}->reveal());

        $result = $this->commandHandler->execute($command);
        
        $this->assertTrue($result);
        $this->assertEquals($expectId, $command->id);
    }

    public function testExecuteFail()
    {
        $command = new Add{@nameCaps}Command(
        );

        ${@name} = $this->prophesize({@nameCaps}::class);
        ${@name}->getId()->shouldBeCalledTimes(0);//调用0次

        ${@name}->add()->shouldBeCalledTimes(1)->willReturn(false);

        $this->commandHandler->expects($this->any())
            ->method('get{@nameCaps}')
            ->willReturn(${@name}->reveal());

        $result = $this->commandHandler->execute($command);
        
        $this->assertFalse($result);
    }
}

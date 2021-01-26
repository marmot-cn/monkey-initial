<?php
namespace {@namespaceCaps}\CommandHandler\{@nameCaps};

use Prophecy\Argument;
use PHPUnit\Framework\TestCase;
use Marmot\Interfaces\ICommand;

use {@namespaceCaps}\Model\{@nameCaps};
use {@namespaceCaps}\Repository\{@nameCaps}Repository;
use {@namespaceCaps}\Command\{@nameCaps}\Edit{@nameCaps}Command;

class {@operateCaps}{@nameCaps}CommandHandlerTest extends TestCase
{
    private $commandHandler;

    private $faker;

    public function setUp()
    {
        $this->commandHandler = $this->getMockBuilder(Edit{@nameCaps}CommandHandler::class)
                                     ->setMethods(['get{@nameCaps}Repository'])
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

    public function testGet{@nameCaps}Repository()
    {
        $commandHandler = new MockEdit{@nameCaps}CommandHandler();
        $this->assertInstanceOf(
            '{@namespaceCaps}\Repository\{@nameCaps}Repository',
            $commandHandler->get{@nameCaps}Repository()
        );
    }

    public function testExecute()
    {
        $command = new Edit{@nameCaps}Command(
            $this->faker->randomNumber()
        );

        ${@name} = $this->prophesize({@nameCaps}::class);
        ${@name}->edit()->shouldBeCalledTimes(1)->willReturn(true);

        ${@name}Repository = $this->prophesize({@nameCaps}Repository::class);
        ${@name}Repository->fetchOne(Argument::exact($command->id))
                                ->shouldBeCalledTimes(1)
                                ->willReturn(${@name}->reveal());
        $this->commandHandler->expects($this->any())
            ->method('get{@nameCaps}Repository')
            ->willReturn(${@name}Repository->reveal());

        $result = $this->commandHandler->execute($command);
        
        $this->assertTrue($result);
    }
}

<?php
namespace {@namespaceCaps}\CommandHandler\{@nameCaps};

use PHPUnit\Framework\TestCase;

use Marmot\Interfaces\ICommand;
use Marmot\Framework\Classes\NullCommandHandler;

use {@namespaceCaps}\Command\{@nameCaps}\Add{@nameCaps}Command;
use {@namespaceCaps}\Command\{@nameCaps}\Edit{@nameCaps}Command;

class {@nameCaps}CommandHandlerFactoryTest extends TestCase
{
    private $commandHandler;

    private $faker;

    public function setUp()
    {
        $this->faker = \Faker\Factory::create('zh_CN');
        //初始化工厂桩件
        $this->commandHandler = new {@nameCaps}CommandHandlerFactory();
    }

    public function testDefaultCommandHandler()
    {
        $command = $this->getMockBuilder(ICommand::class)
                        ->getMock();

        $commandHandler = $this->commandHandler->getHandler(
            $command
        );

        $this->assertInstanceOf('Marmot\Framework\Classes\NullCommandHandler', $commandHandler);
    }

    public function testAdd{@nameCaps}CommandHandler()
    {
        $commandHandler = $this->commandHandler->getHandler(
            new Add{@nameCaps}Command(
            )
        );

        $this->assertInstanceOf('Marmot\Interfaces\ICommandHandler', $commandHandler);
        $this->assertInstanceOf(
            '{@namespaceCaps}\CommandHandler\{@nameCaps}\Add{@nameCaps}CommandHandler',
            $commandHandler
        );
    }

    public function testEdit{@nameCaps}CommandHandler()
    {
        $commandHandler = $this->commandHandler->getHandler(
            new Edit{@nameCaps}Command(
                $this->faker->randomNumber()
            )
        );

        $this->assertInstanceOf('Marmot\Interfaces\ICommandHandler', $commandHandler);
        $this->assertInstanceOf(
            '{@namespaceCaps}\CommandHandler\{@nameCaps}\Edit{@nameCaps}CommandHandler',
            $commandHandler
        );
    }
}

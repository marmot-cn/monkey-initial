<?php
namespace {@namespaceCaps}\CommandHandler\{@nameCaps};

use Marmot\Interfaces\ICommandHandlerFactory;
use Marmot\Interfaces\ICommandHandler;
use Marmot\Interfaces\ICommand;
use Marmot\Framework\Classes\NullCommandHandler;

class {@nameCaps}CommandHandlerFactory implements ICommandHandlerFactory
{
    const MAPS = array(
        '{@namespaceCaps}\Command\{@nameCaps}\Add{@nameCaps}Command' =>
        '{@namespaceCaps}\CommandHandler\{@nameCaps}\Add{@nameCaps}CommandHandler',
        '{@namespaceCaps}\Command\{@nameCaps}\Edit{@nameCaps}Command' =>
        '{@namespaceCaps}\CommandHandler\{@nameCaps}\Edit{@nameCaps}CommandHandler',
    );

    public function getHandler(ICommand $command) : ICommandHandler
    {
        $commandClass = get_class($command);
        $commandHandler = isset(self::MAPS[$commandClass]) ? self::MAPS[$commandClass] : '';

        return class_exists($commandHandler) ? new $commandHandler : NullCommandHandler::getInstance();
    }
}

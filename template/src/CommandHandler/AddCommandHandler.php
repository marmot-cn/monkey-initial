<?php
namespace {@namespaceCaps}\CommandHandler\{@nameCaps};

use Marmot\Interfaces\ICommandHandler;
use Marmot\Interfaces\ICommand;

use {@namespaceCaps}\Command\{@nameCaps}\Add{@nameCaps}Command;
use {@namespaceCaps}\Model\{@nameCaps};

class Add{@nameCaps}CommandHandler implements ICommandHandler
{
    protected function get{@nameCaps}() : {@nameCaps}
    {
        return new {@nameCaps}();
    }

    public function execute(ICommand $command)
    {
        if (!($command instanceof Add{@nameCaps}Command)) {
            throw new \InvalidArgumentException;
        }

        ${@name} = $this->get{@nameCaps}();

        if (${@name}->add()) {
            $command->id = ${@name}->getId();
            return true;
        }
        return false;
    }
}
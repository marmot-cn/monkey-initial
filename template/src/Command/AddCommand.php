<?php
namespace {@namespaceCaps}\Command\{@nameCaps};

use Marmot\Interfaces\ICommand;

class Add{@nameCaps}Command implements ICommand
{
	public $id;

 	public function __construct(
        int $id = 0
    ) {
        $this->id = $id;
    }
}
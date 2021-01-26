<?php
namespace {@namespaceCaps}\Command\{@nameCaps};

use Marmot\Interfaces\ICommand;

class {@operateCaps}{@nameCaps}Command implements ICommand
{
	public $id;

 	public function __construct(
        int $id 
    ) {
        $this->id = $id;
    }
}
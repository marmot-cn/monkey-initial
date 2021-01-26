<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps}\Query\Persistence;

use Marmot\Framework\Classes\Db;

class {@nameCaps}Db extends Db
{
    const TABLE = '{@nameUnderScore}';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }
}

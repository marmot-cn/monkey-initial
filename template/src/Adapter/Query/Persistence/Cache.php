<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps}\Query\Persistence;

use Marmot\Framework\Classes\Cache;

class {@nameCaps}Cache extends Cache
{
    const KEY = '{@name}';

    public function __construct()
    {
        parent::__construct(self::KEY);
    }
}

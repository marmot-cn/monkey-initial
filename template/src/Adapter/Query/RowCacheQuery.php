<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps}\Query;

use Marmot\Framework\Query\RowCacheQuery;

class {@nameCaps}RowCacheQuery extends RowCacheQuery
{
    public function __construct()
    {
        parent::__construct(
            '{@nameUnderScore}_id',
            new Persistence\{@nameCaps}Cache(),
            new Persistence\{@nameCaps}Db()
        );
    }
}

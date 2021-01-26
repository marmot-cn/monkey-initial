<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps}\Query;

use Marmot\Framework\Interfaces\DbLayer;
use Marmot\Interfaces\CacheLayer;

class Mock{@nameCaps}RowCacheQuery extends {@nameCaps}RowCacheQuery
{
    public function getCacheLayer() : CacheLayer
    {
        return parent::getCacheLayer();
    }

    public function getDbLayer() : DbLayer
    {
        return parent::getDbLayer();
    }
}

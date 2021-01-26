<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps};

use Marmot\Interfaces\INull;

use {@namespaceCaps}\Translator\{@nameCaps}DbTranslator;
use {@namespaceCaps}\Adapter\{@nameCaps}\Query\{@nameCaps}RowCacheQuery;

class Mock{@nameCaps}DbAdapter extends {@nameCaps}DbAdapter
{
    public function getDbTranslator() : {@nameCaps}DbTranslator
    {
        return parent::getDbTranslator();
    }

    public function getRowQuery() : {@nameCaps}RowCacheQuery
    {
        return parent::getRowQuery();
    }

    public function getNullObject() : INull
    {
        return parent::getNullObject();
    }

    public function formatFilter(array $filter) : string
    {
        return parent::formatFilter($filter);
    }

    public function formatSort(array $sort) : string
    {
        return parent::formatSort($sort);
    }
}

<?php
namespace {@namespaceCaps}\Repository;

use {@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter;

class Mock{@nameCaps}Repository extends {@nameCaps}Repository
{
    public function getAdapter() : I{@nameCaps}Adapter
    {
        return parent::getAdapter();
    }

    public function getActualAdapter() : I{@nameCaps}Adapter
    {
        return parent::getActualAdapter();
    }

    public function getMockAdapter() : I{@nameCaps}Adapter
    {
        return parent::getMockAdapter();
    }
}

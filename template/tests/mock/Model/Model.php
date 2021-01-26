<?php
namespace {@namespaceCaps}\Model;

use {@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter;

class Mock{@nameCaps} extends {@nameCaps}
{
    public function getRepository() : I{@nameCaps}Adapter
    {
        return parent::getRepository();
    }
}

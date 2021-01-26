<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps};

use {@namespaceCaps}\Model\{@nameCaps};

interface I{@nameCaps}Adapter
{
    public function fetchOne($id) : {@nameCaps};

    public function fetchList(array $ids) : array;

    public function filter(
        array $filter = array(),
        array $sort = array(),
        int $offset = 0,
        int $size = 0
    ) : array;

    public function add({@nameCaps} ${@name}) : bool;

    public function edit({@nameCaps} ${@name}, array $keys = array()) : bool;
}
<?php
namespace {@namespaceCaps}\Repository;

use Marmot\Framework\Classes\Repository;

use {@namespaceCaps}\Model\{@nameCaps};
use {@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter;
use {@namespaceCaps}\Adapter\{@nameCaps}\{@nameCaps}DbAdapter;
use {@namespaceCaps}\Adapter\{@nameCaps}\{@nameCaps}MockAdapter;

class {@nameCaps}Repository extends Repository implements I{@nameCaps}Adapter
{
    private $adapter;

    public function __construct()
    {
        $this->adapter = new {@nameCaps}DbAdapter();
    }

    public function __destruct()
    {
        unset($this->adapter);
    }

    public function setAdapter(I{@nameCaps}Adapter $adapter)
    {
        $this->adapter = $adapter;
    }
    
    protected function getActualAdapter() : I{@nameCaps}Adapter
    {
        return $this->adapter;
    }

    protected function getMockAdapter() : I{@nameCaps}Adapter
    {
        return new {@nameCaps}MockAdapter();
    }

    public function fetchOne($id) : {@nameCaps}
    {
        return $this->getAdapter()->fetchOne($id);
    }

    public function fetchList(array $ids) : array
    {
        return $this->getAdapter()->fetchList($ids);
    }

    public function filter(
        array $filter = array(),
        array $sort = array(),
        int $offset = 0,
        int $size = 20
    ) : array {
        return $this->getAdapter()->filter($filter, $sort, $offset, $size);
    }

    public function add({@nameCaps} ${@name}) : bool
    {
        return $this->getAdapter()->add(${@name});
    }

    public function edit({@nameCaps} ${@name}, array $keys = array()) : bool
    {
        return $this->getAdapter()->edit(${@name}, $keys);
    }
}

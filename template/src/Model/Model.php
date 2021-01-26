<?php
namespace {@namespaceCaps}\Model;

use Marmot\Core;
use Marmot\Common\Model\Object;
use Marmot\Common\Model\IObject;

use {@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter;
use {@namespaceCaps}\Repository\{@nameCaps}Repository;

class {@nameCaps} implements IObject
{
	use Object;

    /**
     * @var $id
     */
    protected $id;

	public function __construct(int $id = 0)
    {
        $this->id = $id;
        $this->status = 0;
        $this->statusTime = 0;
        $this->createTime = Core::$container->get('time');
        $this->updateTime = Core::$container->get('time');
        $this->repository = new {@nameCaps}Repository();
    }

    public function __destruct()
    {
        unset($this->id);
        unset($this->status);
        unset($this->statusTime);
        unset($this->createTime);
        unset($this->updateTime);
        unset($this->repository);
    }

    /**
     * @marmot-set-id
     */
    public function setId($id) : void
    {
        $this->id = $id;
    }
    /**
     * @marmot-get-id
     */
    public function getId()
    {
        return $this->id;
    }

    public function setStatus(int $status) : void
    {
        
    }

    protected function getRepository() : I{@nameCaps}Adapter
    {
        return $this->repository;
    }
    
    public function add() : bool
    {
        return true;
    }

    public function edit() : bool
    {
        return true;
    }
}
<?php
namespace {@namespaceCaps}\Controller;

use Marmot\Interfaces\IView;
use Marmot\Framework\Classes\Controller;

use Marmot\Framework\Common\Controller\IFetchController;
use Marmot\Framework\Common\Controller\FetchControllerTrait;

use {@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter;
use {@namespaceCaps}\View\{@nameCaps}View;
use {@namespaceCaps}\Repository\{@nameCaps}Repository;

class {@nameCaps}FetchController extends Controller implements IFetchController
{
    use FetchControllerTrait;

    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = new {@nameCaps}Repository();
    }

    public function __destruct()
    {
        parent::__destruct();
        unset($this->repository);
    }

    protected function getRepository() : I{@nameCaps}Adapter
    {
        return $this->repository;
    }

    protected function generateView($data) : IView
    {
        return new {@nameCaps}View($data);
    }

    protected function getResourceName() : string
    {
        //资源的复数
        return '';
    }
}

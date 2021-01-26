<?php
namespace {@namespaceCaps}\Repository;

use Prophecy\Argument;
use PHPUnit\Framework\TestCase;

use {@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter;
use {@namespaceCaps}\Adapter\{@nameCaps}\{@nameCaps}DBAdapter;

use {@namespaceCaps}\Utils\{@nameCaps}MockFactory;

class {@nameCaps}RepositoryTest extends TestCase
{
    private $repository;
    
    private $mockRepository;

    public function setUp()
    {
        $this->repository = $this->getMockBuilder({@nameCaps}Repository::class)
                           ->setMethods(['getAdapter'])
                           ->getMock();
                           
        $this->mockRepository = new Mock{@nameCaps}Repository();
    }

    public function testCorrectInstanceExtendsRepository()
    {
        $this->assertInstanceOf(
            'Marmot\Framework\Classes\Repository',
            $this->repository
        );
    }

    public function testSetAdapterCorrectType()
    {
        $adapter = new {@nameCaps}DBAdapter();

        $this->repository->setAdapter($adapter);
        $this->assertEquals($adapter, $this->mockRepository->getAdapter());
    }

    public function testGetActualAdapter()
    {
        $this->assertInstanceOf(
            '{@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter',
            $this->mockRepository->getActualAdapter()
        );
        $this->assertInstanceOf(
            '{@namespaceCaps}\Adapter\{@nameCaps}\{@nameCaps}DBAdapter',
            $this->mockRepository->getActualAdapter()
        );
    }

    public function testGetMockAdapter()
    {
        $this->assertInstanceOf(
            '{@namespaceCaps}\Adapter\{@nameCaps}\I{@nameCaps}Adapter',
            $this->mockRepository->getMockAdapter()
        );
        $this->assertInstanceOf(
            '{@namespaceCaps}\Adapter\{@nameCaps}\{@nameCaps}MockAdapter',
            $this->mockRepository->getMockAdapter()
        );
    }

    public function testFetchOne()
    {
        $id = 1;

        $adapter = $this->prophesize(I{@nameCaps}Adapter::class);
        $adapter->fetchOne(Argument::exact($id))
                ->shouldBeCalledTimes(1);

        $this->repository->expects($this->exactly(1))
                         ->method('getAdapter')
                         ->willReturn($adapter->reveal());

        $this->repository->fetchOne($id);
    }

    public function testFetchList()
    {
        $ids = [1, 2, 3];

        $adapter = $this->prophesize(I{@nameCaps}Adapter::class);
        $adapter->fetchList(Argument::exact($ids))
                ->shouldBeCalledTimes(1);

        $this->repository->expects($this->exactly(1))
                         ->method('getAdapter')
                         ->willReturn($adapter->reveal());

        $this->repository->fetchList($ids);
    }

    public function testFilter()
    {
        $filter = array();
        $sort = array();
        $offset = 0;
        $size = 20;

        $adapter = $this->prophesize(I{@nameCaps}Adapter::class);
        $adapter->filter(
            Argument::exact($filter),
            Argument::exact($sort),
            Argument::exact($offset),
            Argument::exact($size)
        )->shouldBeCalledTimes(1);

        $this->repository->expects($this->exactly(1))
                         ->method('getAdapter')
                         ->willReturn($adapter->reveal());
                
        $this->repository->filter($filter, $sort, $offset, $size);
    }

    public function testAdd()
    {
        $id = 1;
        ${@name} = {@nameCaps}MockFactory::generate{@nameCaps}($id);
        $keys = array();
        
        $adapter = $this->prophesize(I{@nameCaps}Adapter::class);
        $adapter->add(Argument::exact(${@name}))->shouldBeCalledTimes(1);

        $this->repository->expects($this->exactly(1))
                         ->method('getAdapter')
                         ->willReturn($adapter->reveal());

        $this->repository->add(${@name}, $keys);
    }

    public function testEdit()
    {
        $id = 1;
        ${@name} = {@nameCaps}MockFactory::generate{@nameCaps}($id);
        $keys = array();
        
        $adapter = $this->prophesize(I{@nameCaps}Adapter::class);
        $adapter->edit(Argument::exact(${@name}), Argument::exact($keys))
                ->shouldBeCalledTimes(1);

        $this->repository->expects($this->exactly(1))
                         ->method('getAdapter')
                         ->willReturn($adapter->reveal());

        $this->repository->edit(${@name}, $keys);
    }
}

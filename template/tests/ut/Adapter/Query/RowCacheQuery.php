<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps}\Query;

use PHPUnit\Framework\TestCase;
use Marmot\Core;

class {@nameCaps}RowCacheQueryTest extends TestCase
{
    private $rowCacheQuery;

    public function setUp()
    {
        $this->rowCacheQuery = new Mock{@nameCaps}RowCacheQuery();
    }

    public function tearDown()
    {
        unset($this->rowCacheQuery);
    }

    /**
     * 测试该文件是否正确的继承RowCacheQuery类
     */
    public function testCorrectInstanceExtendsRowCacheQuery()
    {
        $this->assertInstanceof('Marmot\Framework\Query\RowCacheQuery', $this->rowCacheQuery);
    }

    /**
     * 测试是否cache层赋值正确
     */
    public function testCorrectCacheLayer()
    {
        $this->assertInstanceof(
            '{@namespaceCaps}\Adapter\{@nameCaps}\Query\Persistence\{@nameCaps}Cache',
            $this->rowCacheQuery->getCacheLayer()
        );
    }

    /**
     * 测试是否db层赋值正确
     */
    public function testCorrectDbLayer()
    {
        $this->assertInstanceof(
            '{@namespaceCaps}\Adapter\{@nameCaps}\Query\Persistence\{@nameCaps}Db',
            $this->rowCacheQuery->getDbLayer()
        );
    }
}

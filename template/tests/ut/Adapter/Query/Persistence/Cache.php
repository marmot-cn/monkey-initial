<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps}\Query\Persistence;

use PHPUnit\Framework\TestCase;
use Marmot\Core;

class {@nameCaps}CacheTest extends TestCase
{
    private $cache;

    public function setUp()
    {
        $this->cache = new Mock{@nameCaps}Cache();
    }

    /**
     * 测试该文件是否正确的继承cache类
     */
    public function testCorrectInstanceExtendsCache()
    {
        $this->assertInstanceof('Marmot\Framework\Classes\Cache', $this->cache);
    }

    /**
     * 测试 key
     */
    public function testGetKey()
    {
        $this->assertEquals({@nameCaps}Cache::KEY, $this->cache->getKey());
    }
}

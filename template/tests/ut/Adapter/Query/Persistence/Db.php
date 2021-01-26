<?php
namespace {@namespaceCaps}\Adapter\{@nameCaps}\Query\Persistence;

use PHPUnit\Framework\TestCase;
use Marmot\Core;

class {@nameCaps}DbTest extends TestCase
{
    private $database;

    public function setUp()
    {
        $this->database = new Mock{@nameCaps}Db();
    }

    /**
     * 测试该文件是否正确的继承db类
     */
    public function testCorrectInstanceExtendsDb()
    {
        $this->assertInstanceof('Marmot\Framework\Classes\Db', $this->database);
    }

    /**
     * 测试 table
     */
    public function testGetTable()
    {
        $this->assertEquals({@nameCaps}Db::TABLE, $this->database->getTable());
    }
}

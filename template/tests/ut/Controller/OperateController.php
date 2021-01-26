<?php
namespace {@namespaceCaps}\Controller;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

use Marmot\Framework\Classes\Request;
use Marmot\Framework\Classes\CommandBus;

use Common\WidgetRule\CommonWidgetRule;

use {@namespaceCaps}\Model\{@nameCaps};
use {@namespaceCaps}\WidgetRule\{@nameCaps}WidgetRule;
use {@namespaceCaps}\Repository\{@nameCaps}Repository;
use {@namespaceCaps}\Command\{@nameCaps}\Add{@nameCaps}Command;
use {@namespaceCaps}\Command\{@nameCaps}\Edit{@nameCaps}Command;

class {@nameCaps}OperateControllerTest extends TestCase
{
    private $controller;

    public function setUp()
    {
        $this->controller = new {@nameCaps}OperateController();
    }

    public function tearDown()
    {
        unset($this->controller);
    }

    public function testExtendsController()
    {
        $this->assertInstanceOf(
            'Marmot\Framework\Classes\Controller',
            $this->controller
        );
    }

    public function testImplementsIOperateController()
    {
        $this->assertInstanceOf(
            'Marmot\Framework\Common\Controller\IOperateController',
            $this->controller
        );
    }

    /**
     * 测试 add 成功
     * 1. 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
     *    get{@nameCaps}WidgetRule、getCommandBus、getRepository、render方法
     * 2. 调用 $this->initAdd(), 期望结果为 true
     * 3. 为 {@nameCaps} 类建立预言
     * 4. 为 {@nameCaps}Repository 类建立预言, {@nameCaps}Repository->fetchOne 方法被调用一次,
     *    且 返回结果为 预言的{@nameCaps}, getRepository 方法被调用一次
     * 5. render 方法被调用一次, 且controller返回结果为 true
     * 6. controller->add 方法被调用一次, 且返回结果为 true
     */
    public function testAdd()
    {
        // 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
        // get{@nameCaps}WidgetRule、getCommandBus、getRepository、render方法
        $controller = $this->getMockBuilder({@nameCaps}OperateController::class)
            ->setMethods(
                [
                    'getRequest',
                    'getCommonWidgetRule',
                    'get{@nameCaps}WidgetRule',
                    'getCommandBus',
                    'getRepository',
                    'render'
                ]
            )->getMock();

        // 调用 $this->initAdd(), 期望结果为 true
        $this->initAdd($controller, true);

        // 为 {@nameCaps} 类建立预言
        ${@name}  = $this->prophesize({@nameCaps}::class);

        // 为 {@nameCaps}Repository 类建立预言, {@nameCaps}Repository->fetchOne 方法被调用一次,
        // 且 返回结果为 预言的{@nameCaps}, getRepository 方法被调用一次
        $id = 0;
        $repository = $this->prophesize({@nameCaps}Repository::class);
        $repository->fetchOne(Argument::exact($id))
                   ->shouldBeCalledTimes(1)
                   ->willReturn(${@name} );
        $controller->expects($this->once())
                             ->method('getRepository')
                             ->willReturn($repository->reveal());

        // render 方法被调用一次, 且controller返回结果为 true
        $controller->expects($this->exactly(1))
            ->method('render')
            ->willReturn(true);

        // controller->add 方法被调用一次, 且返回结果为 true
        $result = $controller->add();
        $this->assertTrue($result);
    }

    /**
     * 测试 add 失败
     * 1. 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
     *    get{@nameCaps}WidgetRule、getCommandBus、displayError 方法
     * 2. 调用 $this->initAdd(), 期望结果为 false
     * 3. displayError 方法被调用一次, 且controller返回结果为 false
     * 4. controller->add 方法被调用一次, 且返回结果为 false
     */
    public function testAddFail()
    {
        // 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
        // get{@nameCaps}WidgetRule、getCommandBus、displayError 方法
        $controller = $this->getMockBuilder({@nameCaps}OperateController::class)
            ->setMethods(
                [
                    'getRequest',
                    'getCommonWidgetRule',
                    'get{@nameCaps}WidgetRule',
                    'getCommandBus',
                    'displayError'
                ]
            )->getMock();

        // 调用 $this->initAdd(), 期望结果为 false
        $this->initAdd($controller, false);

        // displayError 方法被调用一次, 且controller返回结果为 false
        $controller->expects($this->exactly(1))
            ->method('displayError')
            ->willReturn(false);

        // controller->add 方法被调用一次, 且返回结果为 false
        $result = $controller->add();
        $this->assertFalse($result);
    }

    /**
     * 初始化 add 方法
     * 1. mock 请求参数
     * 2. 为 Request 类建立预言, 验证请求参数, getRequest 方法被调用一次
     * 3. 为 CommonWidgetRule 类建立预言, 验证请求参数,  getCommonWidgetRule 方法被调用一次
     * 4. 为 {@nameCaps}WidgetRule 类建立预言, 验证请求参数, get{@nameCaps}WidgetRule 方法被调用一次
     * 5. 为 CommandBus 类建立预言, 传入 Add{@nameCaps}Command参数, 且 send 方法被调用一次,
     *    且返回结果为预期结果$result, getCommandBus 方法被调用一次
     */
    protected function initAdd({@nameCaps}OperateController $controller, bool $result)
    {
        // mock 请求参数
        $data = array(
            'attributes' => array(
            ),
        );

        // 为 Request 类建立预言, 验证请求参数, getRequest 方法被调用一次
        $request = $this->prophesize(Request::class);
        $request->post(Argument::exact('data'))
            ->shouldBeCalledTimes(1)
            ->willReturn($data);
        $controller->expects($this->exactly(1))
            ->method('getRequest')
            ->willReturn($request->reveal());

        // 为 CommonWidgetRule 类建立预言, 验证请求参数,  getCommonWidgetRule 方法被调用一次
        $commonWidgetRule = $this->prophesize(CommonWidgetRule::class);
        $controller->expects($this->exactly(1))
            ->method('getCommonWidgetRule')
            ->willReturn($commonWidgetRule->reveal());

        $this->bind{@nameCaps}WidgetRule($controller);

        // 为 CommandBus 类建立预言, 传入 Add{@nameCaps}Command参数, 且 send 方法被调用一次,
        // 且返回结果为预期结果$result, getCommandBus 方法被调用一次
        $commandBus = $this->prophesize(CommandBus::class);
        $commandBus->send(
            Argument::exact(
                new Add{@nameCaps}Command(
                )
            )
        )->shouldBeCalledTimes(1)->willReturn($result);
        $controller->expects($this->exactly(1))
            ->method('getCommandBus')
            ->willReturn($commandBus->reveal());
    }

    /**
     * 测试 edit 成功
     * 1. 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
     *    get{@nameCaps}WidgetRule、getCommandBus、getRepository、render方法
     * 2. 调用 $this->initEdit(), 期望结果为 true
     * 3. 为 {@nameCaps} 类建立预言
     * 4. 为 {@nameCaps}Repository 类建立预言, {@nameCaps}Repository->fetchOne 方法被调用一次,
     *    且 返回结果为 预言的{@nameCaps}, getRepository 方法被调用一次
     * 5. render 方法被调用一次, 且controller返回结果为 true
     * 6. controller->edit 方法被调用一次, 且返回结果为 true
     */
    public function testEdit()
    {
        // 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
        // get{@nameCaps}WidgetRule、getCommandBus、getRepository、render方法
        $controller = $this->getMockBuilder({@nameCaps}OperateController::class)
            ->setMethods(
                [
                    'getRequest',
                    'getCommonWidgetRule',
                    'get{@nameCaps}WidgetRule',
                    'getCommandBus',
                    'getRepository',
                    'render'
                ]
            )->getMock();
        $id = 1;

        $this->initEdit($controller, $id, true);

        // 为 {@nameCaps} 类建立预言
        ${@name} = $this->prophesize({@nameCaps}::class);

        // 为 {@nameCaps}Repository 类建立预言, {@nameCaps}Repository->fetchOne 方法被调用一次,
        // 且 返回结果为 预言的{@nameCaps}, getRepository 方法被调用一次
        $repository = $this->prophesize({@nameCaps}Repository::class);
        $repository->fetchOne(Argument::exact($id))
                   ->shouldBeCalledTimes(1)
                   ->willReturn(${@name} );
        $controller->expects($this->once())
                             ->method('getRepository')
                             ->willReturn($repository->reveal());

        // render 方法被调用一次, 且controller返回结果为 true
        $controller->expects($this->exactly(1))
            ->method('render')
            ->willReturn(true);

        // controller->edit 方法被调用一次, 且返回结果为 true
        $result = $controller->edit($id);
        $this->assertTrue($result);
    }

    /**
     * 测试 edit 失败
     * 1. 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
     *    get{@nameCaps}WidgetRule、getCommandBus、displayError 方法
     * 2. 调用 $this->initEdit(), 期望结果为 false
     * 3. displayError 方法被调用一次, 且controller返回结果为 false
     * 4. controller->edit 方法被调用一次, 且返回结果为 false
     */
    public function testEditFail()
    {
        // 为 {@nameCaps}OperateController 类建立桩件, 并模仿 getRequest、getCommonWidgetRule、
        // get{@nameCaps}WidgetRule、getCommandBus、displayError 方法
        $controller = $this->getMockBuilder({@nameCaps}OperateController::class)
            ->setMethods(
                [
                    'getRequest',
                    'getCommonWidgetRule',
                    'get{@nameCaps}WidgetRule',
                    'getCommandBus',
                    'displayError'
                ]
            )->getMock();
        $id = 1;

        // 调用 $this->initEdit(), 期望结果为 false
        $this->initEdit($controller, $id, false);

        // displayError 方法被调用一次, 且controller返回结果为 false
        $controller->expects($this->exactly(1))
            ->method('displayError')
            ->willReturn(false);

        // controller->edit 方法被调用一次, 且返回结果为 false
        $result = $controller->edit($id);
        $this->assertFalse($result);
    }

    /**
     * 初始化 edit 方法
     * 1. mock 请求参数
     * 2. 为 Request 类建立预言, 验证请求参数, getRequest 方法被调用一次
     * 3. 为 {@nameCaps}WidgetRule 类建立预言, 验证请求参数, get{@nameCaps}WidgetRule 方法被调用一次
     * 4. 为 CommandBus 类建立预言, 传入 Edit{@nameCaps}Command参数, 且 send 方法被调用一次,
     *    且返回结果为预期结果$result, getCommandBus 方法被调用一次
     */
    protected function initEdit({@nameCaps}OperateController $controller, int $id, bool $result)
    {
        // mock 请求参数
        $data = array(
            'attributes' => array(
            ),
        );

        // 为 Request 类建立预言, 验证请求参数, getRequest 方法被调用一次
        $request = $this->prophesize(Request::class);
        $request->patch(Argument::exact('data'))
            ->shouldBeCalledTimes(1)
            ->willReturn($data);
        $controller->expects($this->exactly(1))
            ->method('getRequest')
            ->willReturn($request->reveal());

        $commonWidgetRule = $this->prophesize(CommonWidgetRule::class);
        $controller->expects($this->exactly(1))
            ->method('getCommonWidgetRule')
            ->willReturn($commonWidgetRule->reveal());

        $this->bind{@nameCaps}WidgetRule($controller);

        // 为 CommandBus 类建立预言, 传入 Edit{@nameCaps}Command参数, 且 send 方法被调用一次,
        // 且返回结果为预期结果$result, getCommandBus 方法被调用一次
        $commandBus = $this->prophesize(CommandBus::class);
        $commandBus->send(
            Argument::exact(
                new Edit{@nameCaps}Command(
                    $id
                )
            )
        )->shouldBeCalledTimes(1)->willReturn($result);
        $controller->expects($this->exactly(1))
            ->method('getCommandBus')
            ->willReturn($commandBus->reveal());
    }

    private function bind{@nameCaps}WidgetRule($controller)
    {
        // 为 {@nameCaps}WidgetRule 类建立预言, 验证请求参数, get{@nameCaps}WidgetRule 方法被调用一次
        ${@name}WidgetRule = $this->prophesize({@nameCaps}WidgetRule::class);
        $controller->expects($this->exactly(1))
            ->method('get{@nameCaps}WidgetRule')
            ->willReturn(${@name}WidgetRule->reveal());
    }
}

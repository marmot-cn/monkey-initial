<?php
namespace {@namespaceCaps}\Controller;

use Marmot\Framework\Classes\Controller;
use Marmot\Framework\Interfaces\IView;
use Marmot\Framework\Classes\CommandBus;
use Marmot\Framework\Controller\JsonApiTrait;

use Marmot\Core;

use Marmot\Framework\Common\Controller\IOperateController;

use {@namespaceCaps}\Model\{@nameCaps};
use {@namespaceCaps}\View\{@nameCaps}View;

use {@namespaceCaps}\Command\{@nameCaps}\Add{@nameCaps}Command;
use {@namespaceCaps}\Command\{@nameCaps}\Edit{@nameCaps}Command;

class {@nameCaps}OperateController extends Controller implements IOperateController
{
    use JsonApiTrait;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    public function add()
    {
        //初始化数据
        $data = $this->getRequest()->post('data');
        $attributes = $data['attributes'];

        //验证
        if ($this->validateAddScenario(
        )) {
            //初始化命令
            $commandBus = $this->getCommandBus();
            $command = new Add{@nameCaps}Command(
            );

            //执行命令
            if ($commandBus->send($command)) {
                //获取最新数据
                $repository = $this->getRepository();
                $department = $repository->fetchOne($command->id);
                if ($department instanceof {@nameCaps}) {
                    $this->getResponse()->setStatusCode(201);
                    $this->render(new {@nameCaps}View($department));
                    return true;
                }
            }
        }

        $this->displayError();
        return false;
    }

    protected function validateAddScenario(
    ) : bool {
        $commonWidgetRule = $this->getCommonWidgetRule();
        ${@name}WidgetRule = $this->get{@nameCaps}WidgetRule();
        return true;
    }

    public function edit(int $id)
    {
        $data = $this->getRequest()->patch('data');
        $attributes = $data['attributes'];
        

        if ($this->validateEditScenario()) {
            $commandBus = $this->getCommandBus();

            $command = new Edit{@nameCaps}Command(
                $id
            );

            if ($commandBus->send($command)) {
                $repository = $this->getRepository();
                $organization = $repository->fetchOne($id);
                if ($organization instanceof {@nameCaps}) {
                    $this->render(new {@nameCaps}View($organization));
                    return true;
                }
            }
        }

        $this->displayError();
        return false;
    }

    protected function validateEditScenario(
    ) : bool {
        $commonWidgetRule = $this->getCommonWidgetRule();
        ${@name}WidgetRule = $this->get{@nameCaps}WidgetRule();
        return true;
    }
}

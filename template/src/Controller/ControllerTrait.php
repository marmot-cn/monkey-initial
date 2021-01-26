<?php
namespace {@namespaceCaps}\Controller;

use Marmot\Framework\Classes\CommandBus;

use Common\WidgetRule\CommonWidgetRule;

use {@namespaceCaps}\WidgetRule\{@nameCaps}WidgetRule;
use {@namespaceCaps}\Repository\{@nameCaps}Repository;
use {@namespaceCaps}\CommandHandler\{@nameCaps}\{@nameCaps}CommandHandlerFactory;

trait {@nameCaps}ControllerTrait
{
    protected function get{@nameCaps}WidgetRule() : {@nameCaps}WidgetRule
    {
        return new {@nameCaps}WidgetRule();
    }

    protected function getCommonWidgetRule() : CommonWidgetRule
    {
        return new CommonWidgetRule();
    }

    protected function getRepository() : {@nameCaps}Repository
    {
        return new {@nameCaps}Repository();
    }

    protected function getCommandBus() : CommandBus
    {
        return new CommandBus(new {@nameCaps}CommandHandlerFactory());
    }
}

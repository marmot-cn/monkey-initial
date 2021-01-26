<?php
namespace {@namespaceCaps}\WidgetRule;

use PHPUnit\Framework\TestCase;

use Marmot\Core;

class {@nameCaps}WidgetRuleTest extends TestCase
{
    private $widgetRule;

    public function setUp()
    {
        $this->widgetRule = new {@nameCaps}WidgetRule();
        Core::setLastError(ERROR_NOT_DEFINED);
    }

    public function tearDown()
    {
        unset($this->widgetRule);
        Core::setLastError(ERROR_NOT_DEFINED);
    }
}

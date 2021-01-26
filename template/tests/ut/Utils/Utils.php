<?php
namespace {@namespaceCaps}\Utils;

trait {@nameCaps}Utils
{
    private function compareArrayAndObject(
        array $expectedArray,
        ${@name}
    ) {
        $this->assertEquals($expectedArray['{@nameUnderScore}_id'], ${@name}->getId());

        $this->assertEquals($expectedArray['status'], ${@name}->getStatus());
        $this->assertEquals($expectedArray['create_time'], ${@name}->getCreateTime());
        $this->assertEquals($expectedArray['update_time'], ${@name}->getUpdateTime());
        $this->assertEquals($expectedArray['status_time'], ${@name}->getStatusTime());
    }
}

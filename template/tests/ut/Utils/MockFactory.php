<?php
namespace {@namespaceCaps}\Utils;

use {@namespaceCaps}\Model\{@nameCaps};

class {@nameCaps}MockFactory
{
    public static function generate{@nameCaps}(
        int $id = 0,
        int $seed = 0,
        array $value = array()
    ) : {@nameCaps} {
        $faker = \Faker\Factory::create('zh_CN');
        $faker->seed($seed);

        ${@name} = new {@nameCaps}($id);
        ${@name}->setId($id);

        self::generateStatus(${@name}, $faker, $value);
        
        ${@name}->setCreateTime($faker->unixTime());
        ${@name}->setUpdateTime($faker->unixTime());
        ${@name}->setStatusTime($faker->unixTime());

        return ${@name};
    }

    private static function generateStatus(${@name}, $faker, $value) : void
    {
        unset($faker);
        $status = isset($value['status']) ?
            $value['status'] :
            0;
        
        ${@name}->setStatus($status);
    }
}

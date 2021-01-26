<?php
namespace {@namespaceCaps}\Translator;

use {@namespaceCaps}\Model\{@nameCaps};
use {@namespaceCaps}\Model\Null{@nameCaps};

use Marmot\Framework\Common\Translator\RestfulTranslatorTrait;
use Marmot\Interfaces\IRestfulTranslator;

class {@nameCaps}RestfulTranslator implements IRestfulTranslator
{
    use RestfulTranslatorTrait;

    public function arrayToObject(array $expression, ${@name} = null)
    {
        return $this->translateToObject($expression, ${@name});
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    protected function translateToObject(array $expression, ${@name} = null)
    {
        if (empty($expression)) {
            return Null{@nameCaps}::getInstance();
        }

        if (${@name} == null) {
            ${@name} = new {@nameCaps}();
        }
        
        $data =  $expression['data'];

        if (isset($data['id'])) {
            $id = $data['id'];
            ${@name}->setId($id);
        }

        $attributes = isset($data['attributes']) ? $data['attributes'] : '';

        if (isset($attributes['createTime'])) {
            ${@name}->setCreateTime($attributes['createTime']);
        }
        if (isset($attributes['updateTime'])) {
            ${@name}->setUpdateTime($attributes['updateTime']);
        }
        if (isset($attributes['status'])) {
            ${@name}->setStatus($attributes['status']);
        }
        if (isset($attributes['statusTime'])) {
            ${@name}->setStatusTime($attributes['statusTime']);
        }

        $relationships = isset($data['relationships']) ? $data['relationships'] : array();

        return ${@name};
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function objectToArray(${@name}, array $keys = array())
    {
        $expression = array();

        if (!${@name} instanceof {@nameCaps}) {
            return $expression;
        }

        if (empty($keys)) {
            $keys = array(
                'id',
            );
        }

        $expression = array(
            'data'=>array(
                'type'=>'{@name}'
            )
        );

        if (in_array('id', $keys)) {
            $expression['data']['id'] = ${@name}->getId();
        }

        $attributes = array();

        return $expression;
    }
}
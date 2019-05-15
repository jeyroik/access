<?php
namespace jr\components\extensions\patterns\access;

use jr\components\extensions\patterns\PatternExtensionBaseV2 as BaseV2;
use jr\interfaces\patterns\access\IAccessPatternTriggerOperationV1;
use jr\interfaces\patterns\IPattern;

/**
 * Class AccessExtensionPatternTriggerOperationV1
 *
 * @package jr\components\extensions\patterns\access
 * @author jeyroik@gmail.com
 */
class AccessExtensionPatternTriggerOperationV1 extends BaseV2 implements IAccessPatternTriggerOperationV1
{
    public $subject = IAccessPatternTriggerOperationV1::NAME;

    public $name = IAccessPatternTriggerOperationV1::NAME;
    public $description = 'Access for trigger operations pattern v1';
    public $schema = [
        self::FIELD__VERSION => '<string>',
        self::FIELD__TOKEN => '<string>',
        self::FIELD__ACTION => '<string>',
        self::FIELD__DATA => [
            self::FIELD__ACCESS => [
                self::FIELD__ACCESS_OPERATION => '<string>'
            ]
        ]
    ];

    /**
     * @param IPattern|null $pattern
     *
     * @return array|mixed
     */
    public function getAccess(IPattern $pattern = null)
    {
        $data = $this->getData($pattern);

        return $data[static::FIELD__ACCESS] ?? [];
    }

    /**
     * @param IPattern|null $pattern
     *
     * @return mixed|string
     */
    public function getAccessOperation(IPattern $pattern = null)
    {
        $access = $this->getAccess($pattern);

        return $access[static::FIELD__ACCESS_OPERATION] ?? '';
    }
}

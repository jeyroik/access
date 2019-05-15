<?php
namespace jr\components\extensions\patterns\access;

use jr\components\extensions\patterns\PatternExtensionBaseV2;
use jr\interfaces\patterns\access\IAccessPatternV1;
use jr\interfaces\patterns\IPattern;

/**
 * Class AccessExtensionPatternV1
 *
 * @package jr\components\extensions\patterns\access
 * @author jeyroik@gmail.com
 */
class AccessExtensionPatternV1 extends PatternExtensionBaseV2 implements IAccessPatternV1
{
    public $subject = IAccessPatternV1::NAME;

    public $name = IAccessPatternV1::NAME;
    public $description = 'Access pattern v1';
    public $schema = [
        self::FIELD__VERSION => '<string>',
        self::FIELD__TOKEN => '<string>',
        self::FIELD__ACTION => '<string>',
        self::FIELD__DATA => [
            self::FIELD__ACCESS => '<object>'
        ]
    ];

    /**
     * @param IPattern|null $pattern
     *
     * @return array
     */
    public function getAccess(IPattern $pattern = null)
    {
        $data = $this->getData($pattern);

        return $data[static::FIELD__ACCESS] ?? [];
    }
}

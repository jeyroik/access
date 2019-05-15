<?php
namespace jr\components\extensions\patterns\access;

use jr\components\extensions\patterns\PatternExtensionBaseV2;
use jr\interfaces\patterns\access\IAccessPatternCsvV1;
use jr\interfaces\patterns\IPattern;

/**
 * Class AccessExtensionPatternCsvV1
 *
 * @package jr\components\extensions\patterns\access
 * @author jeyroik@gmail.com
 */
class AccessExtensionPatternCsvV1 extends PatternExtensionBaseV2 implements IAccessPatternCsvV1
{
    public $subject = IAccessPatternCsvV1::NAME;

    public $name = IAccessPatternCsvV1::NAME;
    public $description = 'Access upload from csv v1';
    public $schema = [
        self::FIELD__VERSION => '<string>',
        self::FIELD__TOKEN => '<string>',
        self::FIELD__ACTION => '<string>',
        self::FIELD__DATA => [
            self::FIELD__ACCESS_CSV => '<string>'
        ]
    ];

    /**
     * @param IPattern|null $pattern
     *
     * @return string
     */
    public function getAccessCSV(IPattern $pattern = null): string
    {
        $data = $this->getData($pattern);

        return $data[static::FIELD__ACCESS_CSV] ?? '';
    }
}

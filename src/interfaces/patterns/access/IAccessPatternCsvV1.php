<?php
namespace jr\interfaces\patterns\access;

use jr\interfaces\patterns\IPatternBaseV2;

/**
 * Interface IAccessPatternCsvV1
 *
 * @package jr\interfaces\patterns\access
 * @author jeyroik@gmail.com
 */
interface IAccessPatternCsvV1 extends IPatternBaseV2
{
    const NAME = 'jr.pattern.access.csv.v1';
    const FIELD__ACCESS_CSV = 'access_csv';

    /**
     * @return string
     */
    public function getAccessCSV(): string;
}

<?php
namespace jr\interfaces\patterns\access;

use jr\interfaces\patterns\IPatternBaseV2;

/**
 * Interface IAccessPatternV1
 *
 * @package jr\interfaces\patterns\access
 * @author jeyroik@gmail.com
 */
interface IAccessPatternV1 extends IPatternBaseV2
{
    const NAME = 'jr.pattern.access.v1';
    const FIELD__ACCESS = 'access';

    /**
     * @return array
     */
    public function getAccess();
}

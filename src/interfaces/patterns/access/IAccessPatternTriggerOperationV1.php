<?php
namespace jr\interfaces\patterns\access;

use jr\interfaces\patterns\IPatternBaseV2;

/**
 * Interface IAccessPatternTriggerOperationV1
 *
 * @package jr\interfaces\patterns\access
 * @author jeyroik@gmail.com
 */
interface IAccessPatternTriggerOperationV1 extends IPatternBaseV2
{
    const NAME = 'jr.pattern.access.trigger.operation.v1';
    const FIELD__ACCESS = 'access';
    const FIELD__ACCESS_OPERATION = 'operation';

    /**
     * @return mixed
     */
    public function getAccess();

    /**
     * @return mixed
     */
    public function getAccessOperation();
}

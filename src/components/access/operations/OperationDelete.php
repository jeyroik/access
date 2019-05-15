<?php
namespace jr\components\access\operations;

use jr\components\access\AccessOperation;

/**
 * Class OperationDelete
 *
 * @package jr\components\access\operations
 * @author jeyroik@gmail.com
 */
class OperationDelete extends AccessOperation
{
    const NAME = 'delete';

    protected $operation = [self::NAME, OperationTriggerOwner::NAME];
}

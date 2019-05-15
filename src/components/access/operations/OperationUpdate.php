<?php
namespace jr\components\access\operations;

use jr\components\access\AccessOperation;

/**
 * Class OperationUpdate
 *
 * @package jr\components\access\operations
 * @author jeyroik@gmail.com
 */
class OperationUpdate extends AccessOperation
{
    const NAME = 'update';

    protected $operation = self::NAME;
}

<?php
namespace jr\components\access\operations;

use jr\components\access\AccessOperation;

/**
 * Class OperationCreate
 *
 * @package jr\components\access\operations
 * @author Jeyroik <jeyroik@gmail.com>
 */
class OperationCreate extends AccessOperation
{
    const NAME = 'create';

    protected $operation = self::NAME;
}

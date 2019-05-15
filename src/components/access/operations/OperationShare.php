<?php
namespace jr\components\access\operations;

use jr\components\access\AccessOperation;

/**
 * Class OperationShare
 *
 * @package jr\components\access\operations
 * @author jeyroik@gmail.com
 */
class OperationShare extends AccessOperation
{
    const NAME = 'share';

    protected $operation = self::NAME;
}

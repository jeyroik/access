<?php
namespace jr\components\access\operations;

use jr\components\access\AccessOperation;

/**
 * Class OperationView
 *
 * @package jr\components\access\operations
 * @author jeyroik@gmail.com
 */
class OperationView extends AccessOperation
{
    const NAME = 'view';

    protected $operation = self::NAME;
}

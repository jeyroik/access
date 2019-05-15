<?php
namespace jr\components\access\operations;

use jr\components\access\AccessOperation;

/**
 * Class OperationShareCancel
 *
 * @package jr\components\access\operations
 * @author jeyroik@gmail.com
 */
class OperationShareCancel extends AccessOperation
{
    const NAME = 'share.cancel';

    protected $operation = self::NAME;
}

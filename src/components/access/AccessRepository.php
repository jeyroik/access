<?php
namespace jr\components\access;

use jr\interfaces\access\IAccessRepository;
use jeyroik\extas\components\systems\repositories\RepositoryMongo;

/**
 * Class AccessRepository
 *
 * @package jr\components\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
class AccessRepository extends RepositoryMongo implements IAccessRepository
{
    protected $collectionName = 'jr__access';
    protected $itemClass = Access::class;
}

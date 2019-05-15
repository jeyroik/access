<?php
namespace jr\interfaces\access;

/**
 * Interface IAccessSubject
 *
 * @package jr\interfaces\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
interface IAccessSubject extends IAccess
{
    /**
     * @param $operation
     * @param string $subject
     * @param string $section
     *
     * @return bool
     */
    public function hasOperation($operation, $subject = '', $section = ''): bool;
}

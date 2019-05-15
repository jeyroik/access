<?php
namespace jr\interfaces\access;

/**
 * Interface IAccessOperation
 *
 * @package jr\interfaces\access
 * @author jeyroik@gmail.com
 */
interface IAccessOperation extends IAccess
{
    /**
     * @return bool
     */
    public function create(): bool;

    /**
     * @return bool
     */
    public function update(): bool;

    /**
     * @return bool
     */
    public function delete(): bool;

    /**
     * @return bool
     */
    public function exists(): bool;
}

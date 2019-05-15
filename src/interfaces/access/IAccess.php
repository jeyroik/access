<?php
namespace jr\interfaces\access;

use jeyroik\extas\interfaces\systems\IItem;

/**
 * Interface IAccess
 *
 * @package jr\interfaces\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
interface IAccess extends IItem
{
    const SUBJECT = 'jr.access';

    const FIELD__OBJECT = 'object';
    const FIELD__SECTION = 'section';
    const FIELD__SUBJECT = 'subject';
    const FIELD__OPERATION = 'operation';
    const FIELD__RULES = 'rules';

    /**
     * @return mixed
     */
    public function getObject();

    /**
     * @return string|array
     */
    public function getSection();

    /**
     * @return string|array
     */
    public function getSubject();

    /**
     * @return string|array
     */
    public function getOperation();

    /**
     * @return array
     */
    public function getRules();

    /**
     * @param $object
     *
     * @return IAccess
     */
    public function setObject($object);

    /**
     * @param $section
     *
     * @return IAccess
     */
    public function setSection($section);

    /**
     * @param $subject
     *
     * @return IAccess
     */
    public function setSubject($subject);

    /**
     * @param $operation
     *
     * @return IAccess
     */
    public function setOperation($operation);

    /**
     * @param $rules
     *
     * @return IAccess
     */
    public function setRules($rules);
}

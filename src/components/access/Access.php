<?php
namespace jr\components\access;

use jr\interfaces\access\IAccess;
use jeyroik\extas\components\systems\Item;

/**
 * Class Access
 *
 * @package jr\components\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
class Access extends Item implements IAccess
{
    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->config[static::FIELD__OBJECT] ?? '';
    }

    /**
     * @return string|array
     */
    public function getSection()
    {
        return $this->config[static::FIELD__SECTION] ?? '';
    }

    /**
     * @return string|array
     */
    public function getSubject()
    {
        return $this->config[static::FIELD__SUBJECT] ?? '';
    }

    /**
     * @return string|array
     */
    public function getOperation()
    {
        return $this->config[static::FIELD__OPERATION] ?? '';
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->config[static::FIELD__RULES] ?? [];
    }

    /**
     * @param $object
     *
     * @return IAccess
     */
    public function setObject($object)
    {
        $this->config[static::FIELD__OBJECT] = $object;

        return $this;
    }

    /**
     * @param $section
     *
     * @return IAccess
     */
    public function setSection($section)
    {
        $this->config[static::FIELD__SECTION] = $section;

        return $this;
    }

    /**
     * @param $subject
     *
     * @return IAccess
     */
    public function setSubject($subject)
    {
        $this->config[static::FIELD__SUBJECT] = $subject;

        return $this;
    }

    /**
     * @param $operation
     *
     * @return IAccess
     */
    public function setOperation($operation)
    {
        $this->config[static::FIELD__OPERATION] = $operation;

        return $this;
    }

    /**
     * @param $rules
     *
     * @return IAccess
     */
    public function setRules($rules)
    {
        $this->config[static::FIELD__RULES] = $rules;

        return $this;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}

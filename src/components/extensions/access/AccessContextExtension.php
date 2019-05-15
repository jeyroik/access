<?php
namespace jr\components\extensions\access;

use jr\components\access\AccessOperation;
use jr\components\access\AccessSection;
use jr\components\access\AccessSubject;
use jr\interfaces\access\IAccess;
use jr\interfaces\access\IAccessSection;
use jr\interfaces\access\IAccessSubject;
use jr\interfaces\extensions\access\IAccessContextExtension;
use jeyroik\extas\components\systems\Extension;
use jeyroik\extas\interfaces\systems\IContext;

/**
 * Class AccessContextExtension
 *
 * @package jr\components\extensions\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
class AccessContextExtension extends Extension implements IAccessContextExtension
{
    public $subject = IContext::SUBJECT;

    /**
     * @param $accessData
     *
     * @return IAccess
     * @throws
     */
    public function createAccess($accessData): IAccess
    {
        $operation = new AccessOperation($accessData);
        $operation->create();

        return $operation;
    }

    /**
     * @param IContext|null $context
     *
     * @return \jr\interfaces\players\IPlayer|mixed|null
     */
    public function getCurrentPlayer(IContext &$context = null)
    {
        return isset($context[static::CONTEXT_ITEM__PLAYER_CURRENT])
            ? $context[static::CONTEXT_ITEM__PLAYER_CURRENT]
            : null;
    }

    /**
     * @param $object
     * @param $name
     *
     * @return IAccessSection
     */
    public function getAccessSection($object, $name): IAccessSection
    {
        return new AccessSection([IAccess::FIELD__OBJECT => $object, IAccess::FIELD__SECTION => $name]);
    }

    /**
     * @param $object
     * @param $section
     * @param $subject
     *
     * @return IAccessSubject
     */
    public function getAccessSubject($object, $section, $subject): IAccessSubject
    {
        return new AccessSubject([
            IAccess::FIELD__OBJECT => $object,
            IAccess::FIELD__SECTION => $section,
            IAccess::FIELD__SUBJECT => $subject
        ]);
    }

    /**
     * @param $object
     * @param $section
     * @param $subject
     * @param $operation
     *
     * @return bool
     */
    public function hasAccess($object, $section, $subject, $operation): bool
    {
        $operation = new AccessOperation([
            IAccess::FIELD__OBJECT => $object,
            IAccess::FIELD__SECTION => $section,
            IAccess::FIELD__SUBJECT => $subject,
            IAccess::FIELD__OPERATION => $operation
        ]);

        return $operation->exists();
    }
}

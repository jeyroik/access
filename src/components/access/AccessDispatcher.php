<?php
namespace jr\components\access;

use jr\interfaces\access\IAccess;
use jr\interfaces\access\IAccessRepository;
use jr\interfaces\extensions\access\IAccessContextExtension;
use jr\interfaces\players\IPlayer;
use jeyroik\extas\components\dispatchers\DispatcherAbstract;
use jeyroik\extas\components\systems\states\StateMachine;
use jeyroik\extas\components\systems\SystemContainer;
use jeyroik\extas\interfaces\systems\contexts\IContextOnFailure;

/**
 * Class AccessDispatcher
 *
 * @package jr\components\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
abstract class AccessDispatcher extends DispatcherAbstract
{
    protected $requiredAccess = [
        IAccess::FIELD__OBJECT => '',
        IAccess::FIELD__SECTION => '',
        IAccess::FIELD__SUBJECT => '',
        IAccess::FIELD__OPERATION => ''
    ];

    /**
     * @return $this
     * @throws
     */
    protected function initDefault()
    {
        parent::initDefault();

        if (!in_array(IAccessContextExtension::class, $this->requireInterfaces)) {
            $this->requireInterfaces[] = IAccessContextExtension::class;
        }
        if (!in_array(IContextOnFailure::class, $this->requireInterfaces)) {
            $this->requireInterfaces[] = IContextOnFailure::class;
        }

        return $this;
    }

    /**
     * @param $object
     *
     * @return bool
     * @throws \Exception
     */
    protected function isRequiredAccessAllowed($object): bool
    {
        /**
         * @var $repo IAccessRepository
         */
        $repo = SystemContainer::getItem(IAccessRepository::class);

        $this->requiredAccess[IAccess::FIELD__OBJECT] = $object instanceof IPlayer
            ? $object->getAliases()
            : $object;

        /**
         * @var $access IAccess
         */
        $access = $repo->find($this->requiredAccess)->one();

        if (!$access) {
            return false;
        }

        $rules = $access->getRules();

        if (empty($rules)) {
            return true;
        }

        $sm = new StateMachine($rules);
        $sm->run();
        /**
         * @var $context IContextOnFailure
         */
        $context = $sm->getCurrentContext();

        return $context->isSuccess();
    }
}

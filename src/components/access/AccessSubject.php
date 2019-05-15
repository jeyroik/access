<?php
namespace jr\components\access;

use jr\interfaces\access\IAccess;
use jr\interfaces\access\IAccessRepository;
use jr\interfaces\access\IAccessSubject;
use jeyroik\extas\components\systems\SystemContainer;

/**
 * Class AccessSubject
 *
 * @package jr\components\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
class AccessSubject extends AccessOperation implements IAccessSubject
{
    protected $subject = '';

    /**
     * AccessSection constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->subject && ($config[IAccess::FIELD__SUBJECT] = $this->subject);

        parent::__construct($config);
    }

    /**
     * @param $operation
     * @param string $subject
     * @param string $section
     *
     * @return bool
     */
    public function hasOperation($operation, $subject = '', $section = ''): bool
    {
        $repo = $this->getRepo();

        $operation = $repo->find([
            IAccess::FIELD__OBJECT => $this->getObject(),
            IAccess::FIELD__SECTION => $section ?: $this->getSection(),
            IAccess::FIELD__SUBJECT => $subject ?: $this->getSubject(),
            IAccess::FIELD__OPERATION => $operation
        ])->one();

        return $operation ? true : false;
    }

    /**
     * @return IAccessRepository
     */
    protected function getRepo(): IAccessRepository
    {
        return SystemContainer::getItem(IAccessRepository::class);
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'jr.access.subject';
    }
}

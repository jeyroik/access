<?php
namespace jr\components\access;

use jr\interfaces\access\IAccess;
use jr\interfaces\access\IAccessSection;

/**
 * Class AccessSection
 *
 * @package jr\components\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
class AccessSection extends AccessSubject implements IAccessSection
{
    protected $section = '';

    /**
     * AccessSection constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->section && ($config[IAccess::FIELD__SECTION] = $this->section);

        parent::__construct($config);
    }

    /**
     * @param $subject
     * @param string $section
     *
     * @return bool
     */
    public function hasSubject($subject, $section = ''): bool
    {
        $repo = $this->getRepo();
        $subject = $repo->find([
            IAccess::FIELD__OBJECT => $this->getObject(),
            IAccess::FIELD__SECTION => $section ?: $this->getSection(),
            IAccess::FIELD__SUBJECT => $subject
        ])->one();

        return $subject ? true : false;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'jr.access.section';
    }
}

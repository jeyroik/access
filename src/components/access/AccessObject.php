<?php
namespace jr\components\access;

use jr\interfaces\access\IAccess;
use jr\interfaces\access\IAccessObject;

/**
 * Class AccessObject
 *
 * @package jr\components\access
 * @author jeyroik@gmail.com
 */
class AccessObject extends AccessSection implements IAccessObject
{
    protected $object = '';

    /**
     * AccessObject constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->object && ($config[IAccess::FIELD__OBJECT] = $this->object);

        parent::__construct($config);
    }

    /**
     * @param $section
     *
     * @return bool
     */
    public function hasSection($section): bool
    {
        $repo = $this->getRepo();
        $subject = $repo->find([
            IAccess::FIELD__OBJECT => $this->getObject(),
            IAccess::FIELD__SECTION => $section,
        ])->one();

        return $subject ? true : false;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'jr.access.object';
    }
}

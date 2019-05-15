<?php
namespace jr\interfaces\extensions\access;

use jr\interfaces\access\IAccess;
use jr\interfaces\access\IAccessSection;
use jr\interfaces\access\IAccessSubject;
use jr\interfaces\players\IPlayer;

/**
 * Interface IAccessContextExtension
 *
 * @package jr\interfaces\extensions\access
 * @author Jeyroik <jeyroik@gmail.com>
 */
interface IAccessContextExtension
{
    const CONTEXT_ITEM__PLAYER_CURRENT = 'jr.player.current';

    /**
     * @param $accessData
     *
     * @return IAccess
     */
    public function createAccess($accessData): IAccess;

    /**
     * @return IPlayer
     */
    public function getCurrentPlayer();

    /**
     * @param $object
     * @param $section
     * @param $subject
     * @param $operation
     *
     * @return bool
     */
    public function hasAccess($object, $section, $subject, $operation): bool;

    /**
     * @param $object
     * @param $name
     *
     * @return IAccessSection
     */
    public function getAccessSection($object, $name): IAccessSection;

    /**
     * @param $object
     * @param $section
     * @param $subject
     *
     * @return IAccessSubject
     */
    public function getAccessSubject($object, $section, $subject): IAccessSubject;
}

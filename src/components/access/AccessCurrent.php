<?php
namespace jr\components\access;

use jr\components\players\Player;
use jr\interfaces\access\IAccess;
use jr\interfaces\extensions\access\IAccessContextExtension;
use jr\interfaces\players\IPlayer;
use jr\interfaces\players\IPlayerIdentity;
use jr\interfaces\players\IPlayerSetting;
use jr\components\plugins\players\PlayerPluginAutoToken;
use jeyroik\extas\components\systems\states\StateMachine;
use jeyroik\extas\interfaces\systems\states\IStateMachine;
use jeyroik\extas\interfaces\systems\states\machines\extensions\IStatesRoute;

/**
 * Class AccessCurrent
 *
 * @package jr\components\access
 * @author jeyroik@gmail.com
 */
class AccessCurrent
{
    protected static $instance = null;

    /**
     * @var IPlayer
     */
    protected $currentPlayer = null;

    /**
     * @return IPlayer
     */
    public static function getCurrentPlayer()
    {
        try {
            $player = self::getInstance()->getPlayer();
            if (!$player) {
                $player = static::createGuestPlayer();
            }
        } catch (\Exception $e) {
            $player = static::createGuestPlayer();
        }

        return $player;
    }

    /**
     * @return Player
     */
    protected static function createGuestPlayer()
    {
        return new Player([
            IPlayer::FIELD__NAME => 'guest',
            IPlayer::FIELD__DESCRIPTION => 'guest',
            IPlayer::FIELD__ALIASES => ['guest', 'public'],
            IPlayer::FIELD__IDENTITIES => [
                [
                    IPlayerIdentity::FIELD__ID => 'guest',
                    IPlayerIdentity::FIELD__SECRET => 'guest',
                    IPlayerIdentity::FIELD__SOURCE => 'system'
                ]
            ],
            IPlayer::FIELD__SETTINGS => [
                [
                    IPlayerSetting::FIELD__NAME => PlayerPluginAutoToken::SETTING__TOKEN,
                    IPlayerSetting::FIELD__ID => 'guest'
                ]
            ]
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
    public static function isAllow($object, $section, $subject, $operation): bool
    {
        $operation = new AccessOperation([
            IAccess::FIELD__OBJECT => $object,
            IAccess::FIELD__SECTION => $section,
            IAccess::FIELD__SUBJECT => $subject,
            IAccess::FIELD__OPERATION => $operation
        ]);

        return $operation->exists();
    }

    /**
     * @return static
     * @throws \Exception
     */
    protected static function getInstance()
    {
        return self::$instance ?: self::$instance = new self();
    }

    /**
     * AccessCurrent constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->extractCurrentPlayer();
    }

    /**
     * @return IPlayer|null
     */
    public function getPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * @return $this
     * @throws \Exception
     */
    public function extractCurrentPlayer()
    {
        $configPath = getenv('DF__ACCESS_STATES_PATH') ?: DF__BASE_PATH . '/configs/states/access.php';
        $config = is_file($configPath) ? include $configPath : [];

        /**
         * @var $sm IStateMachine|IStatesRoute
         */
        $sm = new StateMachine($config);
        $sm->run('player.current:cookie');

        /**
         * @var $context IAccessContextExtension
         */
        $context = $sm->getCurrentContext();

        $this->currentPlayer = $context->getCurrentPlayer();

        return $this;
    }
}

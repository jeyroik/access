<?php
namespace jr\components\plugins\access;

use jr\components\access\AccessOperation;
use jr\components\services\ServiceInstaller;
use jeyroik\extas\components\systems\Plugin;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AccessPluginDfServiceInstall
 *
 * @package jr\components\plugins\access
 * @author jeyroik@gmail.com
 */
class AccessPluginDfServiceInstall extends Plugin
{
    const FIELD__ACCESS = 'access';

    /**
     * @param $serviceInstaller ServiceInstaller
     * @param $output OutputInterface
     */
    public function __invoke($serviceInstaller, $output)
    {
        $serviceConfig = $serviceInstaller->getServiceConfig();
        $accessOperations = $serviceConfig[static::FIELD__ACCESS] ?? [];
        $installed = 0;

        foreach ($accessOperations as $accessOperation) {
            $operation = new AccessOperation($accessOperation);
            if (!$operation->exists()) {
                try {
                    $operation->create();
                    $installed++;
                } catch (\Exception $e) {
                    $output->writeln([
                        '<error>Access installing error: ' . $e->getMessage() . '</error>'
                    ]);
                }
            }
        }

        $installed && $output->writeln([
            '<info>Access successfully installed.</info>'
        ]);
    }
}

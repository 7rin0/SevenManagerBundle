<?php

/**
 * User: lseverino
 * Date: 23/10/15
 * Time: 11:02
 */

namespace SevenManagerBundle\Composer;

use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler;
use Composer\Script\CommandEvent;

/**
 * Class ComposerSevenManager
 * @package Sensio\Bundle\DistributionBundle\Composer
 */
class ComposerSevenManager extends ScriptHandler
{
    /**
     * @param CommandEvent $event
     */
    public static function quickStart(CommandEvent $event)
    {

        $options = static::getOptions($event);
        $consoleDir = static::getConsoleDir($event, 'quick installation');

        if (null === $consoleDir) {
            return;
        }
        
        static::executeCommand($event, $consoleDir, 'doctrine:database:create -q -n &', $options['process-timeout']);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:init:dbal --force -q -n &', $options['process-timeout']);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:repository:init -n', $options['process-timeout']);
        static::executeCommand($event, $consoleDir, 'fos:user:create seven_manager lfs.severino@gmail.com s7ven --super-admin -q &', $options['process-timeout']);
        static::executeCommand($event, $consoleDir, 'fos:user:create admin admin@admin.com admin --super-admin -q &', $options['process-timeout']);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:fixtures:load -n', $options['process-timeout']);
        static::executeCommand($event, $consoleDir, 'assets:install', $options['process-timeout']);
        static::executeCommand($event, $consoleDir, 'assetic:dump', $options['process-timeout']);

    }
}

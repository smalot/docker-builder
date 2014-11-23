<?php

namespace Smalot\Docker\Builder\Plugins;

/**
 * Interface PluginInterface
 * @package Smalot\Docker\Builder\Plugins
 */
interface PluginInterface
{
    /**
     * @param array $config
     * @return mixed
     */
    public function setConfig($config);

    /**
     * @return int
     */
    public function getPriority();

    /**
     * @param int $step
     * @return mixed
     */
    public function getStep($step);
}

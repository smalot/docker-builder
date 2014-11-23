<?php

/**
 * @file    This file is part of Dockerfile builder.
 * @author  Sebastien MALOT <sebastien@malot.fr>
 * @license MIT
 * @url     <https://github.com/smalot/dockerfile>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Smalot\Docker\Builder;

use Smalot\Docker\Builder\Plugins\PluginInterface;
use Smalot\Docker\Builder\Step\DockerStep;
use Smalot\Docker\Dockerfile\Dockerfile;

/**
 * Class Builder
 * @package Smalot\Docker\Builder
 */
class Builder
{
    const STEP_DOCKER = 1;

    const STEP_INSTALL = 2;

    const STEP_RUN = 3;

    /**
     * @var array
     */
    protected static $plugins = array();

    /**
     * @var array
     */
    protected $config = array();

    /**
     * @var bool
     */
    protected $processed = false;

    /**
     * @param array $config
     */
    protected function __construct($config)
    {
        $this->config = $config;
        $this->processed = false;
    }

    /**
     * @return Dockerfile
     */
    public function getDockerfile()
    {
        $dockerStep = new DockerStep();

        return $dockerStep->process(self::$plugins);
    }

    /**
     * @return string
     */
    public function getInstallScript()
    {
        return '#!/bin/bash';
    }

    /**
     * @return string
     */
    public function getRunScript()
    {
        return '#!/bin/bash';
    }

    /**
     * @param array $plugins
     */
    public static function setPlugins($plugins)
    {
        self::$plugins = usort($plugins, array('Smalot\Docker\Builder\Builder', 'sortPlugin'));
    }

    /**
     * @param array $config
     * @return Builder
     */
    public static function process($config)
    {
        return new self($config);
    }

    /**
     * @param PluginInterface $a
     * @param PluginInterface $b
     * @return int
     */
    protected static function sortPlugin(PluginInterface $a, PluginInterface $b)
    {
        if ($a->getPriority() == $b->getPriority()) {
            return 0;
        } else {
            return $a->getPriority() > $b->getPriority() ? 1 : -1;
        }
    }
}

<?php

namespace Smalot\Docker\Builder\Step;
use Smalot\Docker\Dockerfile\Dockerfile;

/**
 * Class DockerStep
 * @package Smalot\Docker\Builder\Step
 */
class DockerStep implements StepInterface
{
    /**
     * @param array $plugins
     * @return mixed
     */
    public function process($plugins)
    {
        return new Dockerfile('debian:latest', 'Sebastien MALOT <sebastien@malot.fr>');
    }
}

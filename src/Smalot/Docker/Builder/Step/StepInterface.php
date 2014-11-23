<?php

namespace Smalot\Docker\Builder\Step;

/**
 * Interface StepInterface
 * @package Smalot\Docker\Builder\Step
 */
interface StepInterface
{
    /**
     * @param array $plugins
     * @return mixed
     */
    public function process($plugins);
}

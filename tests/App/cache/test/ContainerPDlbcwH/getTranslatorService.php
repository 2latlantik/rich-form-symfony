<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'translator' shared service.

return $this->services['translator'] = new \Symfony\Component\Translation\IdentityTranslator(($this->privates['translator.selector'] ?? $this->privates['translator.selector'] = new \Symfony\Component\Translation\MessageSelector()));

<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

$this->factories['test.client'] = function () {
    // Returns the public 'test.client' service.

    return new \Symfony\Bundle\FrameworkBundle\Client(($this->services['kernel'] ?? $this->get('kernel')), array(), new \Symfony\Component\BrowserKit\History(), new \Symfony\Component\BrowserKit\CookieJar());
};

return $this->factories['test.client']();

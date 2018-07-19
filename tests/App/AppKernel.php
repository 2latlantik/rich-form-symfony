<?php
namespace Delatlantik\RichFormSymfonyBundle\Tests\App;

use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class AppKernel extends Kernel
{

    /**
     * Returns an array of bundles to register.
     *
     * @return iterable|BundleInterface[] An iterable of bundle instances
     */
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new TwigBundle(),
            new \Delatlantik\RichFormSymfonyBundle\RichFormSymfonyBundle()
        ];
    }

    /**
     * Loads the container configuration.
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__ . '/config/config.yml');
    }

    public function configureContainer(ContainerBuilder $container, LoaderInterface $loader)
    {
        // load only the config files strictly needed for the API
        $confDir = $this->getProjectDir().'/config';
        $loader->load($confDir.'/config.yml', 'glob');

    }

    public function getProjectDir()
    {
        return realpath(__DIR__);
    }
}
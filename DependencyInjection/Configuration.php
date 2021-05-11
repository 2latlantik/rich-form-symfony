<?php


namespace Delatlantik\RichFormSymfonyBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('rich_form_symfony');
        $root = $treeBuilder->getRootNode();

        $root
            ->children()
                ->scalarNode('bootstrap_version')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
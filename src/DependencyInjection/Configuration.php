<?php

namespace Betacie\Bundle\GoogleBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('betacie_google');

        $rootNode
            ->children()
                ->scalarNode('storage')
                ->validate()
                    ->ifNotInArray(array('session', 'array'))
                    ->thenInvalid('The storage %s is not supported.')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

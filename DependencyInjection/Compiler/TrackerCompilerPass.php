<?php

namespace Betacie\Bundle\GoogleBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class TrackerCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('betacie_google.aggregate_tracker')) {
            return;
        }

        $definition = $container->getDefinition(
            'betacie_google.aggregate_tracker'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'betacie_google.tracker'
        );
        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addTracker', array(new Reference($id))
            );
        }
    }

}
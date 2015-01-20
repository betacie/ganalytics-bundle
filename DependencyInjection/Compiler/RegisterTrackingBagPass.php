<?php

namespace Betacie\Bundle\GoogleBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RegisterTrackingBagPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $session = $container->getDefinition('session');
        $session->addMethodCall('registerBag', array(new Reference('betacie_google.tracking_bag')));
    }

}
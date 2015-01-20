<?php

namespace Betacie\Bundle\GoogleBundle;

use Betacie\Bundle\GoogleBundle\DependencyInjection\Compiler\TrackerCompilerPass;
use Betacie\Bundle\GoogleBundle\DependencyInjection\Compiler\RegisterTrackingBagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class BetacieGoogleBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterTrackingBagPass());
        $container->addCompilerPass(new TrackerCompilerPass());
    }

}

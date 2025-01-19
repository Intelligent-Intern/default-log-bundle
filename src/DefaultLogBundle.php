<?php

namespace IntelligentIntern\DefaultLogBundle\DefaultLogBundle;

use IntelligentIntern\DefaultLogBundle\DependencyInjection\Compiler\LogServiceCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DefaultLogBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new LogServiceCompilerPass());
    }
}

<?php

namespace IntelligentIntern\DefaultLogBundle;

use IntelligentIntern\DefaultLogBundle\DependencyInjection\Compiler\LogServiceCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class DefaultLogBundle extends AbstractBundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new LogServiceCompilerPass());
    }
}

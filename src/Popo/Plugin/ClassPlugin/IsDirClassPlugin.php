<?php

declare(strict_types = 1);

namespace Phuxtil\Popo\Plugin\ClassPlugin;

use Phuxtil\Stat\DefinesInterface;
use Popo\Plugin\BuilderPluginInterface;
use Popo\Plugin\ClassPluginInterface;

class IsDirClassPlugin implements ClassPluginInterface
{
    public function run(BuilderPluginInterface $builder): void
    {
        $body = <<<EOF
return \$this->type === '%s';
EOF;

        $body = sprintf($body, DefinesInterface::VALUE_DIR);

        $builder->getClass()
            ->addMethod('isDir')
            ->setPublic()
            ->setReturnType('bool')
            ->setBody($body);
    }
}

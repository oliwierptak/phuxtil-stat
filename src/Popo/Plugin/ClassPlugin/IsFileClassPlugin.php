<?php

declare(strict_types = 1);

namespace Phuxtil\Popo\Plugin\ClassPlugin;

use Phuxtil\Stat\DefinesInterface;
use Popo\Plugin\BuilderPluginInterface;
use Popo\Plugin\ClassPluginInterface;

class IsFileClassPlugin implements ClassPluginInterface
{
    public function run(BuilderPluginInterface $builder): void
    {
        $body = <<<EOF
return \$this->type === '%s';
EOF;

        $body = sprintf($body, DefinesInterface::VALUE_FILE);

        $builder->getClass()
            ->addMethod('isFile')
            ->setPublic()
            ->setReturnType('bool')
            ->setBody($body);
    }
}

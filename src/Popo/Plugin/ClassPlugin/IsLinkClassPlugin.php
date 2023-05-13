<?php

declare(strict_types = 1);

namespace Phuxtil\Popo\Plugin\ClassPlugin;

use Phuxtil\Stat\DefinesInterface;
use Popo\Plugin\BuilderPluginInterface;
use Popo\Plugin\ClassPluginInterface;

class IsLinkClassPlugin implements ClassPluginInterface
{
    public function run(BuilderPluginInterface $builder): void
    {
        $body = <<<EOF
return \$this->type === '%s';
EOF;

        $body = sprintf($body, DefinesInterface::VALUE_LINK);

        $builder->getClass()
            ->addMethod('isLink')
            ->setPublic()
            ->setReturnType('bool')
            ->setBody($body);
    }
}

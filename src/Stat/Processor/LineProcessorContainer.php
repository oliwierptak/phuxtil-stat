<?php

namespace Phuxtil\Stat\Processor;

use Phuxtil\Stat\Processor\LIne\Blocks;
use Phuxtil\Stat\Processor\LIne\DateAccess;
use Phuxtil\Stat\Processor\LIne\DateChange;
use Phuxtil\Stat\Processor\LIne\DateModify;
use Phuxtil\Stat\Processor\LIne\Device;
use Phuxtil\Stat\Processor\LIne\File;
use Phuxtil\Stat\Processor\LIne\Gid;
use Phuxtil\Stat\Processor\LIne\Group;
use Phuxtil\Stat\Processor\LIne\Inode;
use Phuxtil\Stat\Processor\LIne\IoBlock;
use Phuxtil\Stat\Processor\LIne\Links;
use Phuxtil\Stat\Processor\LIne\Permission;
use Phuxtil\Stat\Processor\LIne\Size;
use Phuxtil\Stat\Processor\LIne\Type;
use Phuxtil\Stat\Processor\LIne\Uid;
use Phuxtil\Stat\Processor\LIne\User;

class LineProcessorContainer
{
    protected $lineProcessorClasses = [
        File::class,
        Size::class,
        DateAccess::class,
        DateModify::class,
        DateChange::class,
        Permission::class,
        Uid::class,
        User::class,
        Gid::class,
        Group::class,
        Type::class,
        Inode::class,
        Device::class,
        Links::class,
        Blocks::class,
        IoBlock::class,
    ];

    public function createLineProcessorCollection(): array
    {
        $lineProcessorCollection = [];
        foreach ($this->lineProcessorClasses as $lineProcessorClass) {
            $lineProcessor = new $lineProcessorClass();
            $lineProcessorCollection[$lineProcessorClass::TYPE] = $lineProcessor;
        }

        return $lineProcessorCollection;
    }
}

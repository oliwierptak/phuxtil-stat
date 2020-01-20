<?php

declare(strict_types = 1);

namespace Phuxtil\Stat\Processor;

use Phuxtil\Stat\Processor\Line\Blocks;
use Phuxtil\Stat\Processor\Line\DateAccess;
use Phuxtil\Stat\Processor\Line\DateChange;
use Phuxtil\Stat\Processor\Line\DateModify;
use Phuxtil\Stat\Processor\Line\Device;
use Phuxtil\Stat\Processor\Line\File;
use Phuxtil\Stat\Processor\Line\Gid;
use Phuxtil\Stat\Processor\Line\Group;
use Phuxtil\Stat\Processor\Line\Inode;
use Phuxtil\Stat\Processor\Line\IoBlock;
use Phuxtil\Stat\Processor\Line\Links;
use Phuxtil\Stat\Processor\Line\Permission;
use Phuxtil\Stat\Processor\Line\Size;
use Phuxtil\Stat\Processor\Line\Type;
use Phuxtil\Stat\Processor\Line\Uid;
use Phuxtil\Stat\Processor\Line\User;

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

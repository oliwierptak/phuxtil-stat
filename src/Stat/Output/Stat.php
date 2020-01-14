<?php

namespace Phuxtil\Stat\Output;

use Phuxtil\Stat\DefinesInterface;
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

class Stat
{
    /**
     * @var string
     */
    protected $filename;

    /**
     * Bytes
     *
     * @var int
     */
    protected $size;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string|int
     */
    protected $permission;

    /**
     * @var \DateTime|string
     */
    protected $dateAccess;

    /**
     * @var \DateTime|string
     */
    protected $dateModify;

    /**
     * @var \DateTime|string
     */
    protected $dateChange;

    /**
     * @var int
     */
    protected $uid;

    /**
     * @var int
     */
    protected $gid;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $group;

    /**
     * @var int
     */
    protected $inode;

    /**
     * @var string
     */
    protected $device;

    /**
     * @var int
     */
    protected $links;

    /**
     * @var int
     */
    protected $blocks;

    /**
     * @var int
     */
    protected $ioBlock;

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): Stat
    {
        $this->filename = $filename;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): Stat
    {
        $this->size = $size;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Stat
    {
        $this->type = $type;

        return $this;
    }

    public function getPermission(): string
    {
        return $this->permission;
    }

    public function setPermission(string $permission): Stat
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getDateAccess()
    {
        return $this->dateAccess;
    }

    /**
     * @param \DateTime|string $dateAccess
     *
     * @return $this
     */
    public function setDateAccess($dateAccess): Stat
    {
        $this->dateAccess = $dateAccess;

        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getDateModify()
    {
        return $this->dateModify;
    }

    /**
     * @param \DateTime|string $dateModify
     *
     * @return $this
     */
    public function setDateModify($dateModify): Stat
    {
        $this->dateModify = $dateModify;

        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getDateChange()
    {
        return $this->dateChange;
    }

    /**
     * @param \DateTime|string $dateChange
     *
     * @return $this
     */
    public function setDateChange($dateChange): Stat
    {
        $this->dateChange = $dateChange;

        return $this;
    }

    public function getUid(): int
    {
        return $this->uid;
    }

    public function setUid(int $uid): Stat
    {
        $this->uid = $uid;

        return $this;
    }

    public function getGid(): int
    {
        return $this->gid;
    }

    public function setGid(int $gid): Stat
    {
        $this->gid = $gid;

        return $this;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): Stat
    {
        $this->user = $user;

        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): Stat
    {
        $this->group = $group;

        return $this;
    }

    public function getInode(): int
    {
        return $this->inode;
    }

    public function setInode(int $inode): Stat
    {
        $this->inode = $inode;

        return $this;
    }

    public function getDevice(): string
    {
        return $this->device;
    }

    public function setDevice(string $device): Stat
    {
        $this->device = $device;

        return $this;
    }

    public function getLinks(): int
    {
        return $this->links;
    }

    public function setLinks(int $links): Stat
    {
        $this->links = $links;

        return $this;
    }

    public function getBlocks(): int
    {
        return $this->blocks;
    }

    public function setBlocks(int $blocks): Stat
    {
        $this->blocks = $blocks;

        return $this;
    }

    public function getIoBlock(): int
    {
        return $this->ioBlock;
    }

    public function setIoBlock(int $ioBlock): Stat
    {
        $this->ioBlock = $ioBlock;

        return $this;
    }

    public function fromArray(array $data): Stat
    {
        $this->filename = $data[File::TYPE] ?? '';
        $this->size = $data[Size::TYPE] ?? '';
        $this->type = $data[Type::TYPE] ?? '';
        $this->permission = $data[Permission::TYPE] ?? '';
        $this->dateAccess = $data[DateAccess::TYPE] ?? '';
        $this->dateModify = $data[DateModify::TYPE] ?? '';
        $this->dateChange = $data[DateChange::TYPE] ?? '';
        $this->uid = $data[Uid::TYPE] ?? '';
        $this->gid = $data[Gid::TYPE] ?? '';
        $this->user = $data[User::TYPE] ?? '';
        $this->group = $data[Group::TYPE] ?? '';
        $this->inode = $data[Inode::TYPE] ?? '';
        $this->device = $data[Device::TYPE] ?? '';
        $this->links = $data[Links::TYPE] ?? '';
        $this->blocks = $data[Blocks::TYPE] ?? '';
        $this->ioBlock = $data[IoBlock::TYPE] ?? '';

        return $this;
    }

    public function toArray(): array
    {
        return [
            File::TYPE => $this->filename,
            Size::TYPE => $this->size,
            Type::TYPE => $this->type,
            Permission::TYPE => $this->permission,
            DateAccess::TYPE => $this->dateAccess,
            DateModify::TYPE => $this->dateModify,
            DateChange::TYPE => $this->dateChange,
            Uid::TYPE => $this->uid,
            Gid::TYPE => $this->gid,
            User::TYPE => $this->user,
            Group::TYPE => $this->group,
            Inode::TYPE => $this->inode,
            Device::TYPE => $this->device,
            Links::TYPE => $this->links,
            Blocks::TYPE => $this->blocks,
            IoBlock::TYPE => $this->ioBlock,
        ];
    }

    public function isFile(): bool
    {
        return $this->type === DefinesInterface::VALUE_FILE;
    }

    public function isDir(): bool
    {
        return $this->type === DefinesInterface::VALUE_DIR;
    }

    public function isLink(): bool
    {
        return $this->type === DefinesInterface::VALUE_LINK;
    }

    public function isCharFile(): bool
    {
        return $this->type === DefinesInterface::VALUE_CHAR;
    }
}

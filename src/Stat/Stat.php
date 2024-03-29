<?php

/**
 * Auto-generated by POPO.
 */

declare(strict_types=1);

namespace Phuxtil\Stat;

use DateTime;
use DateTimeZone;
use Throwable;
use UnexpectedValueException;
use function array_filter;
use function array_key_exists;
use function array_keys;
use function in_array;
use function sort;
use const ARRAY_FILTER_USE_KEY;
use const SORT_STRING;

class Stat
{
    protected const METADATA = [
        'filename' => [
            'type' => 'string',
            'default' => null,
            'mappingPolicy' => ['none'],
            'mappingPolicyValue' => 'filename',
        ],
        'type' => ['type' => 'string', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'type'],
        'size' => ['type' => 'int', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'size'],
        'permission' => [
            'type' => 'string',
            'default' => null,
            'mappingPolicy' => ['none'],
            'mappingPolicyValue' => 'permission',
        ],
        'dateAccess' => [
            'type' => 'datetime',
            'default' => '1970-01-01 00:00:00.000000000 +0000',
            'mappingPolicy' => ['none'],
            'mappingPolicyValue' => 'fileatime',
            'format' => 'Y-m-d H:i:s.uU',
            'timezone' => 'Europe/Paris',
        ],
        'dateModify' => [
            'type' => 'datetime',
            'default' => '1970-01-01 00:00:00.000000000 +0000',
            'mappingPolicy' => ['none'],
            'mappingPolicyValue' => 'filemtime',
            'format' => 'Y-m-d H:i:s.uU',
            'timezone' => 'Europe/Paris',
        ],
        'dateChange' => [
            'type' => 'datetime',
            'default' => '1970-01-01 00:00:00.000000000 +0000',
            'mappingPolicy' => ['none'],
            'mappingPolicyValue' => 'filectime',
            'format' => 'Y-m-d H:i:s.uU',
            'timezone' => 'Europe/Paris',
        ],
        'uid' => ['type' => 'int', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'uid'],
        'gid' => ['type' => 'int', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'gid'],
        'user' => ['type' => 'string', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'user'],
        'group' => ['type' => 'string', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'group'],
        'inode' => ['type' => 'int', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'inode'],
        'device' => ['type' => 'string', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'device'],
        'links' => ['type' => 'int', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'links'],
        'blocks' => ['type' => 'int', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'blocks'],
        'ioBlock' => ['type' => 'int', 'default' => null, 'mappingPolicy' => ['none'], 'mappingPolicyValue' => 'ioblock'],
    ];

    protected array $updateMap = [];
    protected ?string $filename = null;
    protected ?string $type = null;
    protected ?int $size = null;
    protected ?string $permission = null;
    protected ?DateTime $dateAccess = null;
    protected ?DateTime $dateModify = null;
    protected ?DateTime $dateChange = null;
    protected ?int $uid = null;
    protected ?int $gid = null;
    protected ?string $user = null;
    protected ?string $group = null;
    protected ?int $inode = null;
    protected ?string $device = null;
    protected ?int $links = null;
    protected ?int $blocks = null;
    protected ?int $ioBlock = null;

    protected function setupDateTimeProperty($propertyName): void
    {
        if (static::METADATA[$propertyName]['type'] === 'datetime' && $this->$propertyName === null) {
            $value = static::METADATA[$propertyName]['default'];
            $datetime = new DateTime($value);
            $timezone = static::METADATA[$propertyName]['timezone'] ?? null;
            if ($timezone !== null) {
                $timezone = new DateTimeZone($timezone);
                $datetime = new DateTime($value, $timezone);
            }
            $this->$propertyName = $datetime;
        }
    }

    public function isNew(): bool
    {
        return empty($this->updateMap) === true;
    }

    public function listModifiedProperties(): array
    {
        $sorted = array_keys($this->updateMap);
        sort($sorted, SORT_STRING);
        return $sorted;
    }

    public function modifiedToArray(): array
    {
        $data = $this->toArray();
        $modifiedProperties = $this->listModifiedProperties();

        return array_filter($data, function ($key) use ($modifiedProperties) {
            return in_array($key, $modifiedProperties);
        }, ARRAY_FILTER_USE_KEY);
    }

    protected function setupPopoProperty($propertyName): void
    {
        if (static::METADATA[$propertyName]['type'] === 'popo' && $this->$propertyName === null) {
            $popo = static::METADATA[$propertyName]['default'];
            $this->$propertyName = new $popo;
        }
    }

    public function requireAll(): self
    {
        $errors = [];

        try {
            $this->requireFilename();
        }
        catch (Throwable $throwable) {
            $errors['filename'] = $throwable->getMessage();
        }
        try {
            $this->requireType();
        }
        catch (Throwable $throwable) {
            $errors['type'] = $throwable->getMessage();
        }
        try {
            $this->requireSize();
        }
        catch (Throwable $throwable) {
            $errors['size'] = $throwable->getMessage();
        }
        try {
            $this->requirePermission();
        }
        catch (Throwable $throwable) {
            $errors['permission'] = $throwable->getMessage();
        }
        try {
            $this->requireDateAccess();
        }
        catch (Throwable $throwable) {
            $errors['dateAccess'] = $throwable->getMessage();
        }
        try {
            $this->requireDateModify();
        }
        catch (Throwable $throwable) {
            $errors['dateModify'] = $throwable->getMessage();
        }
        try {
            $this->requireDateChange();
        }
        catch (Throwable $throwable) {
            $errors['dateChange'] = $throwable->getMessage();
        }
        try {
            $this->requireUid();
        }
        catch (Throwable $throwable) {
            $errors['uid'] = $throwable->getMessage();
        }
        try {
            $this->requireGid();
        }
        catch (Throwable $throwable) {
            $errors['gid'] = $throwable->getMessage();
        }
        try {
            $this->requireUser();
        }
        catch (Throwable $throwable) {
            $errors['user'] = $throwable->getMessage();
        }
        try {
            $this->requireGroup();
        }
        catch (Throwable $throwable) {
            $errors['group'] = $throwable->getMessage();
        }
        try {
            $this->requireInode();
        }
        catch (Throwable $throwable) {
            $errors['inode'] = $throwable->getMessage();
        }
        try {
            $this->requireDevice();
        }
        catch (Throwable $throwable) {
            $errors['device'] = $throwable->getMessage();
        }
        try {
            $this->requireLinks();
        }
        catch (Throwable $throwable) {
            $errors['links'] = $throwable->getMessage();
        }
        try {
            $this->requireBlocks();
        }
        catch (Throwable $throwable) {
            $errors['blocks'] = $throwable->getMessage();
        }
        try {
            $this->requireIoBlock();
        }
        catch (Throwable $throwable) {
            $errors['ioBlock'] = $throwable->getMessage();
        }

        if (empty($errors) === false) {
            throw new UnexpectedValueException(
                implode("\n", $errors)
            );
        }

        return $this;
    }

    public function fromArray(array $data): self
    {
        $metadata = [
            'filename' => 'filename',
            'type' => 'type',
            'size' => 'size',
            'permission' => 'permission',
            'dateAccess' => 'fileatime',
            'dateModify' => 'filemtime',
            'dateChange' => 'filectime',
            'uid' => 'uid',
            'gid' => 'gid',
            'user' => 'user',
            'group' => 'group',
            'inode' => 'inode',
            'device' => 'device',
            'links' => 'links',
            'blocks' => 'blocks',
            'ioBlock' => 'ioblock',
        ];

        foreach ($metadata as $name => $mappedName) {
            $meta = static::METADATA[$name];
            $value = $data[$mappedName] ?? $this->$name ?? null;
            $popoValue = $meta['default'];

            if ($popoValue !== null && $meta['type'] === 'popo') {
                $popo = new $popoValue;

                if (is_array($value)) {
                    $popo->fromArray($value);
                }

                $value = $popo;
            }

            if ($meta['type'] === 'datetime') {
                if (($value instanceof DateTime) === false) {
                    $datetime = new DateTime($data[$name] ?? $meta['default']);
                    $timezone = $meta['timezone'] ?? null;
                    if ($timezone !== null) {
                        $timezone = new DateTimeZone($timezone);
                        $datetime = new DateTime($data[$name] ?? static::METADATA[$name]['default'], $timezone);
                    }
                    $value = $datetime;
                }
            }

            $this->$name = $value;
            if (array_key_exists($mappedName, $data)) {
                $this->updateMap[$name] = true;
            }
        }

        return $this;
    }

    public function fromMappedArray(array $data, ...$mappings): self
    {
        $result = [];
        foreach (static::METADATA as $name => $propertyMetadata) {
            $mappingPolicyValue = $propertyMetadata['mappingPolicyValue'];
            $inputKey = $this->mapKeyName($mappings, $mappingPolicyValue);
            $value = $data[$inputKey] ?? null;

            if (static::METADATA[$name]['type'] === 'popo') {
                $popo = static::METADATA[$name]['default'];
                $value = $this->$name !== null
                    ? $this->$name->fromMappedArray($value ?? [], ...$mappings)
                    : (new $popo)->fromMappedArray($value ?? [], ...$mappings);
                $value = $value->toArray();
            }

            $result[$mappingPolicyValue] = $value;
        }

        $this->fromArray($result);

        return $this;
    }

    public function toArray(): array
    {
        $metadata = [
            'filename' => 'filename',
            'type' => 'type',
            'size' => 'size',
            'permission' => 'permission',
            'dateAccess' => 'fileatime',
            'dateModify' => 'filemtime',
            'dateChange' => 'filectime',
            'uid' => 'uid',
            'gid' => 'gid',
            'user' => 'user',
            'group' => 'group',
            'inode' => 'inode',
            'device' => 'device',
            'links' => 'links',
            'blocks' => 'blocks',
            'ioBlock' => 'ioblock',
        ];

        $data = [];
        foreach ($metadata as $name => $mappedName) {
            $value = $this->$name;

            if (static::METADATA[$name]['type'] === 'popo') {
                $popo = static::METADATA[$name]['default'];
                $value = $this->$name !== null ? $this->$name->toArray() : (new $popo)->toArray();
            }

            if (static::METADATA[$name]['type'] === 'datetime') {
                if (($value instanceof DateTime) === false) {
                    $datetime = new DateTime(static::METADATA[$name]['default']);
                    $timezone = static::METADATA[$name]['timezone'] ?? null;
                    if ($timezone !== null) {
                        $timezone = new DateTimeZone($timezone);
                        $datetime = new DateTime($this->$name ?? static::METADATA[$name]['default'], $timezone);
                    }
                    $value = $datetime;
                }

                $value = $value->format(static::METADATA[$name]['format']);
            }

            $data[$mappedName] = $value;
        }

        return $data;
    }

    public function toMappedArray(...$mappings): array
    {
        return $this->map($this->toArray(), $mappings);
    }

    protected function map(array $data, array $mappings): array
    {
        $result = [];
        foreach (static::METADATA as $name => $propertyMetadata) {
            $value = $data[$propertyMetadata['mappingPolicyValue']];

            if (static::METADATA[$name]['type'] === 'popo') {
                $popo = static::METADATA[$name]['default'];
                $value = $this->$name !== null ? $this->$name->toMappedArray(...$mappings) : (new $popo)->toMappedArray(...$mappings);
            }

            $key = $this->mapKeyName($mappings, $propertyMetadata['mappingPolicyValue']);
            $result[$key] = $value;
        }

        return $result;
    }

    protected function mapKeyName(array $mappings, string $key): string
    {
        static $mappingPolicy = [];

        if (empty($mappingPolicy)) {

            $mappingPolicy['none'] =
                static function (string $key): string {
                    return $key;
                };

            $mappingPolicy['lower'] =
                static function (string $key): string {
                    return mb_strtolower($key);
                };

            $mappingPolicy['upper'] =
                static function (string $key): string {
                    return mb_strtoupper($key);
                };

            $mappingPolicy['snake-to-camel'] =
                static function (string $key): string {
                    $stringTokens = explode('_', mb_strtolower($key));
                $camelizedString = array_shift($stringTokens);
                foreach ($stringTokens as $token) {
                    $camelizedString .= ucfirst($token);
                }

                return $camelizedString;
                };

            $mappingPolicy['camel-to-snake'] =
                static function (string $key): string {
                    $camelizedStringTokens = preg_split('/(?<=[^A-Z])(?=[A-Z])/', $key);
                if ($camelizedStringTokens !== false && count($camelizedStringTokens) > 0) {
                    $key = mb_strtolower(implode('_', $camelizedStringTokens));
                }

                return $key;
                };

        }

        foreach ($mappings as $mappingIndex => $mappingType) {
            if (!array_key_exists($mappingType, $mappingPolicy)) {
                continue;
            }

            $key = $mappingPolicy[$mappingType]($key);
        }

        return $key;
    }

    public function toArrayLower(): array
    {
        return $this->toMappedArray('lower');
    }

    public function toArrayUpper(): array
    {
        return $this->toMappedArray('upper');
    }

    public function toArraySnakeToCamel(): array
    {
        return $this->toMappedArray('snake-to-camel');
    }

    public function toArrayCamelToSnake(): array
    {
        return $this->toMappedArray('camel-to-snake');
    }

    public function isCharFile(): bool
    {
        return $this->type === 'char';
    }

    public function isDir(): bool
    {
        return $this->type === 'dir';
    }

    public function isFile(): bool
    {
        return $this->type === 'regularfile';
    }

    public function isLink(): bool
    {
        return $this->type === 'link';
    }

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function hasFilename(): bool
    {
        return $this->filename !== null;
    }

    public function requireFilename(): string
    {
        $this->setupPopoProperty('filename');
        $this->setupDateTimeProperty('filename');

        if ($this->filename === null) {
            throw new UnexpectedValueException('Required value of "filename" has not been set');
        }
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->filename = $filename; $this->updateMap['filename'] = true; return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function hasType(): bool
    {
        return $this->type !== null;
    }

    public function requireType(): string
    {
        $this->setupPopoProperty('type');
        $this->setupDateTimeProperty('type');

        if ($this->type === null) {
            throw new UnexpectedValueException('Required value of "type" has not been set');
        }
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type; $this->updateMap['type'] = true; return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function hasSize(): bool
    {
        return $this->size !== null;
    }

    public function requireSize(): int
    {
        $this->setupPopoProperty('size');
        $this->setupDateTimeProperty('size');

        if ($this->size === null) {
            throw new UnexpectedValueException('Required value of "size" has not been set');
        }
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size; $this->updateMap['size'] = true; return $this;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function hasPermission(): bool
    {
        return $this->permission !== null;
    }

    public function requirePermission(): string
    {
        $this->setupPopoProperty('permission');
        $this->setupDateTimeProperty('permission');

        if ($this->permission === null) {
            throw new UnexpectedValueException('Required value of "permission" has not been set');
        }
        return $this->permission;
    }

    public function setPermission(?string $permission): self
    {
        $this->permission = $permission; $this->updateMap['permission'] = true; return $this;
    }

    public function getDateAccess(): ?DateTime
    {
        return $this->dateAccess;
    }

    public function hasDateAccess(): bool
    {
        return $this->dateAccess !== null;
    }

    public function requireDateAccess(): DateTime
    {
        $this->setupPopoProperty('dateAccess');
        $this->setupDateTimeProperty('dateAccess');

        if ($this->dateAccess === null) {
            throw new UnexpectedValueException('Required value of "dateAccess" has not been set');
        }
        return $this->dateAccess;
    }

    public function setDateAccess(?DateTime $dateAccess): self
    {
        $this->dateAccess = $dateAccess; $this->updateMap['dateAccess'] = true; return $this;
    }

    public function getDateModify(): ?DateTime
    {
        return $this->dateModify;
    }

    public function hasDateModify(): bool
    {
        return $this->dateModify !== null;
    }

    public function requireDateModify(): DateTime
    {
        $this->setupPopoProperty('dateModify');
        $this->setupDateTimeProperty('dateModify');

        if ($this->dateModify === null) {
            throw new UnexpectedValueException('Required value of "dateModify" has not been set');
        }
        return $this->dateModify;
    }

    public function setDateModify(?DateTime $dateModify): self
    {
        $this->dateModify = $dateModify; $this->updateMap['dateModify'] = true; return $this;
    }

    public function getDateChange(): ?DateTime
    {
        return $this->dateChange;
    }

    public function hasDateChange(): bool
    {
        return $this->dateChange !== null;
    }

    public function requireDateChange(): DateTime
    {
        $this->setupPopoProperty('dateChange');
        $this->setupDateTimeProperty('dateChange');

        if ($this->dateChange === null) {
            throw new UnexpectedValueException('Required value of "dateChange" has not been set');
        }
        return $this->dateChange;
    }

    public function setDateChange(?DateTime $dateChange): self
    {
        $this->dateChange = $dateChange; $this->updateMap['dateChange'] = true; return $this;
    }

    public function getUid(): ?int
    {
        return $this->uid;
    }

    public function hasUid(): bool
    {
        return $this->uid !== null;
    }

    public function requireUid(): int
    {
        $this->setupPopoProperty('uid');
        $this->setupDateTimeProperty('uid');

        if ($this->uid === null) {
            throw new UnexpectedValueException('Required value of "uid" has not been set');
        }
        return $this->uid;
    }

    public function setUid(?int $uid): self
    {
        $this->uid = $uid; $this->updateMap['uid'] = true; return $this;
    }

    public function getGid(): ?int
    {
        return $this->gid;
    }

    public function hasGid(): bool
    {
        return $this->gid !== null;
    }

    public function requireGid(): int
    {
        $this->setupPopoProperty('gid');
        $this->setupDateTimeProperty('gid');

        if ($this->gid === null) {
            throw new UnexpectedValueException('Required value of "gid" has not been set');
        }
        return $this->gid;
    }

    public function setGid(?int $gid): self
    {
        $this->gid = $gid; $this->updateMap['gid'] = true; return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function hasUser(): bool
    {
        return $this->user !== null;
    }

    public function requireUser(): string
    {
        $this->setupPopoProperty('user');
        $this->setupDateTimeProperty('user');

        if ($this->user === null) {
            throw new UnexpectedValueException('Required value of "user" has not been set');
        }
        return $this->user;
    }

    public function setUser(?string $user): self
    {
        $this->user = $user; $this->updateMap['user'] = true; return $this;
    }

    public function getGroup(): ?string
    {
        return $this->group;
    }

    public function hasGroup(): bool
    {
        return $this->group !== null;
    }

    public function requireGroup(): string
    {
        $this->setupPopoProperty('group');
        $this->setupDateTimeProperty('group');

        if ($this->group === null) {
            throw new UnexpectedValueException('Required value of "group" has not been set');
        }
        return $this->group;
    }

    public function setGroup(?string $group): self
    {
        $this->group = $group; $this->updateMap['group'] = true; return $this;
    }

    public function getInode(): ?int
    {
        return $this->inode;
    }

    public function hasInode(): bool
    {
        return $this->inode !== null;
    }

    public function requireInode(): int
    {
        $this->setupPopoProperty('inode');
        $this->setupDateTimeProperty('inode');

        if ($this->inode === null) {
            throw new UnexpectedValueException('Required value of "inode" has not been set');
        }
        return $this->inode;
    }

    public function setInode(?int $inode): self
    {
        $this->inode = $inode; $this->updateMap['inode'] = true; return $this;
    }

    public function getDevice(): ?string
    {
        return $this->device;
    }

    public function hasDevice(): bool
    {
        return $this->device !== null;
    }

    public function requireDevice(): string
    {
        $this->setupPopoProperty('device');
        $this->setupDateTimeProperty('device');

        if ($this->device === null) {
            throw new UnexpectedValueException('Required value of "device" has not been set');
        }
        return $this->device;
    }

    public function setDevice(?string $device): self
    {
        $this->device = $device; $this->updateMap['device'] = true; return $this;
    }

    public function getLinks(): ?int
    {
        return $this->links;
    }

    public function hasLinks(): bool
    {
        return $this->links !== null;
    }

    public function requireLinks(): int
    {
        $this->setupPopoProperty('links');
        $this->setupDateTimeProperty('links');

        if ($this->links === null) {
            throw new UnexpectedValueException('Required value of "links" has not been set');
        }
        return $this->links;
    }

    public function setLinks(?int $links): self
    {
        $this->links = $links; $this->updateMap['links'] = true; return $this;
    }

    public function getBlocks(): ?int
    {
        return $this->blocks;
    }

    public function hasBlocks(): bool
    {
        return $this->blocks !== null;
    }

    public function requireBlocks(): int
    {
        $this->setupPopoProperty('blocks');
        $this->setupDateTimeProperty('blocks');

        if ($this->blocks === null) {
            throw new UnexpectedValueException('Required value of "blocks" has not been set');
        }
        return $this->blocks;
    }

    public function setBlocks(?int $blocks): self
    {
        $this->blocks = $blocks; $this->updateMap['blocks'] = true; return $this;
    }

    public function getIoBlock(): ?int
    {
        return $this->ioBlock;
    }

    public function hasIoBlock(): bool
    {
        return $this->ioBlock !== null;
    }

    public function requireIoBlock(): int
    {
        $this->setupPopoProperty('ioBlock');
        $this->setupDateTimeProperty('ioBlock');

        if ($this->ioBlock === null) {
            throw new UnexpectedValueException('Required value of "ioBlock" has not been set');
        }
        return $this->ioBlock;
    }

    public function setIoBlock(?int $ioBlock): self
    {
        $this->ioBlock = $ioBlock; $this->updateMap['ioBlock'] = true; return $this;
    }
}

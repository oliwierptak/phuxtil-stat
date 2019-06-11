# phuxtil-stat

Provides easy way of accessing data generated by `stat` unix command.

> stat is a Unix system call that returns file attributes about an inode.

### Installation

```
composer require phuxtil/stat
```

### Usage

###### stat sample output
```
  File: /tmp/foo/bar.txt
  Size: 70        	Blocks: 8          IO Block: 4096   regular file
Device: 57h/87d	Inode: 9920467     Links: 1
Access: (0644/-rw-r--r--)  Uid: (    0/    root)   Gid: (    0/    root)
Access: 2019-06-07 18:13:35.000000000 +0000
Modify: 2019-06-07 18:13:35.000000000 +0000
Change: 2019-06-07 18:13:35.000000000 +0000
 Birth: -
``` 


#### Facade
```php
$stat = (new PhpStatFacade())->process(...);

echo $stat->getBlocks();      # 8
echo $stat->getDateAccess();  # DateTime {date: 2019-06-07 18:13:35.0 +00:00}
echo $stat->getDateModify();  # DateTime {date: 2019-06-07 18:13:35.0 +00:00}
echo $stat->getDateChange();  # DateTime {date: 2019-06-07 18:13:35.0 +00:00}
echo $stat->getDevice();      # 57h/87d
echo $stat->getFilename();    # /tmp/foo/bar.txt
echo $stat->getGid();         # 0
echo $stat->getGroup();       # root
echo $stat->getInode();       # 9920467
echo $stat->getIoBlock();     # 4096
echo $stat->getLinks();       # 1
echo $stat->getPermission();  # 644
echo $stat->getSize();        # 70
echo $stat->getType();        # file
echo $stat->getUid();         # 0
echo $stat->getUser();        # root
```

#### $stat->toArray()
```php
print_r($stat->toArray());
```

```php
[
  filename: "/tmp/remote_fs/remote.txt"
  size: 70
  type: "file"
  permission: 644
  dateAccess: DateTime @1559931215 {#4840
    date: 2019-06-07 18:13:35.0 +00:00
  }
  dateModify: DateTime @1559931215 {#4857
    date: 2019-06-07 18:13:35.0 +00:00
  }
  dateChange: DateTime @1559931215 {#4858
    date: 2019-06-07 18:13:35.0 +00:00
  }
  uid: 0
  gid: 0
  user: "root"
  group: "root"
  inode: 9920467
  device: "57h/87d"
  links: 1
  blocks: "8"
  ioBlock: 4096
]
```


#### $stat->fromArray()
```php
$stat->fromArray([
    'filename' => '/tmp/foo/bar.txt',
    'size' => 70,
    'type' => 'file',
    ...
]);
```


See [`PhpStatOutput\Output\Stat`](https://github.com/oliwierptak/php-stat-output/blob/master/src/Output/Stat.php) for details.

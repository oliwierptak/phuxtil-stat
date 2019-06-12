<?php

namespace PhuxtilTests\Functional\Stat;

use PHPUnit\Framework\TestCase;
use Phuxtil\Stat\DefinesInterface;
use Phuxtil\Stat\StatFacade;

class StatFacadeTest extends TestCase
{
    const STAT_OUTPUT_REGULAR_FILE = \TESTS_FIXTURE_DIR . 'stat_output_regular_file.txt';
    const STAT_OUTPUT_SYMLINK = \TESTS_FIXTURE_DIR . 'stat_output_symbolic_link.txt';
    const STAT_OUTPUT_DIRECTORY = \TESTS_FIXTURE_DIR . 'stat_output_directory.txt';
    const STAT_OUTPUT_CHARACTER_SPECIAL_FILE = \TESTS_FIXTURE_DIR . 'stat_output_character_special_file.txt';
    const STAT_OUTPUT_REGULAR_EMPTY_FILE = \TESTS_FIXTURE_DIR . 'stat_output_regular_empty_file.txt';

    public function test_process_file()
    {
        $facade = new StatFacade();

        $output = $facade->process(
            \file_get_contents(static::STAT_OUTPUT_REGULAR_FILE)
        );

        $this->assertEquals(8, $output->getBlocks());
        $this->assertEquals(1559931215, $output->getDateAccess()->getTimestamp());
        $this->assertEquals(1559931215, $output->getDateModify()->getTimestamp());
        $this->assertEquals(1559931215, $output->getDateChange()->getTimestamp());
        $this->assertEquals('57h/87d', $output->getDevice());
        $this->assertEquals('/tmp/remote_fs/remote.txt', $output->getFilename());
        $this->assertEquals(0, $output->getGid());
        $this->assertEquals('root', $output->getGroup());
        $this->assertEquals(9920467, $output->getInode());
        $this->assertEquals(4096, $output->getIoBlock());
        $this->assertEquals(1, $output->getLinks());
        $this->assertEquals('0644', $output->getPermission());
        $this->assertEquals(70, $output->getSize());
        $this->assertEquals(DefinesInterface::VALUE_FILE, $output->getType());
        $this->assertEquals(0, $output->getUid());
        $this->assertEquals('root', $output->getUser());
    }

    public function test_process_symlink()
    {
        $facade = new StatFacade();

        $output = $facade->process(
            \file_get_contents(static::STAT_OUTPUT_SYMLINK)
        );

        $this->assertEquals(0, $output->getBlocks());
        $this->assertEquals(1560083161, $output->getDateAccess()->getTimestamp());
        $this->assertEquals(1560083161, $output->getDateModify()->getTimestamp());
        $this->assertEquals(1560083161, $output->getDateChange()->getTimestamp());
        $this->assertEquals('57h/87d', $output->getDevice());
        $this->assertEquals('remote_link.txt->/tmp/remote_fs/remote.txt', $output->getFilename());
        $this->assertEquals(0, $output->getGid());
        $this->assertEquals('root', $output->getGroup());
        $this->assertEquals(9980288, $output->getInode());
        $this->assertEquals(4096, $output->getIoBlock());
        $this->assertEquals(1, $output->getLinks());
        $this->assertEquals('0777', $output->getPermission());
        $this->assertEquals(25, $output->getSize());
        $this->assertEquals(DefinesInterface::VALUE_LINK, $output->getType());
        $this->assertEquals(0, $output->getUid());
        $this->assertEquals('root', $output->getUser());
    }

    public function test_process_dir()
    {
        $facade = new StatFacade();

        $output = $facade->process(
            \file_get_contents(static::STAT_OUTPUT_DIRECTORY)
        );

        $this->assertEquals(0, $output->getBlocks());
        $this->assertEquals(1560083362, $output->getDateAccess()->getTimestamp());
        $this->assertEquals(1560083161, $output->getDateModify()->getTimestamp());
        $this->assertEquals(1560083161, $output->getDateChange()->getTimestamp());
        $this->assertEquals('57h/87d', $output->getDevice());
        $this->assertEquals('remote_fs/', $output->getFilename());
        $this->assertEquals(0, $output->getGid());
        $this->assertEquals('root', $output->getGroup());
        $this->assertEquals(9979987, $output->getInode());
        $this->assertEquals(4096, $output->getIoBlock());
        $this->assertEquals(4, $output->getLinks());
        $this->assertEquals('0755', $output->getPermission());
        $this->assertEquals(128, $output->getSize());
        $this->assertEquals(DefinesInterface::VALUE_DIR, $output->getType());
        $this->assertEquals(0, $output->getUid());
        $this->assertEquals('root', $output->getUser());
        $this->assertTrue($output->isDir());
    }

    public function test_process_special_file()
    {
        $facade = new StatFacade();

        $output = $facade->process(
            \file_get_contents(static::STAT_OUTPUT_CHARACTER_SPECIAL_FILE)
        );

        $this->assertEquals(0, $output->getBlocks());
        $this->assertEquals(1558951747, $output->getDateAccess()->getTimestamp());
        $this->assertEquals(1558951747, $output->getDateModify()->getTimestamp());
        $this->assertEquals(1558951747, $output->getDateChange()->getTimestamp());
        $this->assertEquals('9eh/158d', $output->getDevice());
        $this->assertEquals('/dev/tty', $output->getFilename());
        $this->assertEquals(0, $output->getGid());
        $this->assertEquals('root', $output->getGroup());
        $this->assertEquals(1805066, $output->getInode());
        $this->assertEquals(4096, $output->getIoBlock());
        $this->assertEquals(1, $output->getLinks());
        $this->assertEquals('0666', $output->getPermission());
        $this->assertEquals(0, $output->getSize());
        $this->assertEquals(DefinesInterface::VALUE_CHAR, $output->getType());
        $this->assertEquals(0, $output->getUid());
        $this->assertEquals('root', $output->getUser());
        $this->assertTrue($output->isCharFile());
    }

    public function test_process_regular_empty_file()
    {
        $facade = new StatFacade();

        $output = $facade->process(
            \file_get_contents(static::STAT_OUTPUT_REGULAR_EMPTY_FILE)
        );

        $this->assertEquals(0, $output->getBlocks());
        $this->assertEquals(1560101586, $output->getDateAccess()->getTimestamp());
        $this->assertEquals(1560101586, $output->getDateModify()->getTimestamp());
        $this->assertEquals(1560101586, $output->getDateChange()->getTimestamp());
        $this->assertEquals('57h/87d', $output->getDevice());
        $this->assertEquals('/tmp/remote_fs/remote.txt', $output->getFilename());
        $this->assertEquals(0, $output->getGid());
        $this->assertEquals('root', $output->getGroup());
        $this->assertEquals(10001013, $output->getInode());
        $this->assertEquals(4096, $output->getIoBlock());
        $this->assertEquals(1, $output->getLinks());
        $this->assertEquals('0644', $output->getPermission());
        $this->assertEquals(0, $output->getSize());
        $this->assertEquals(DefinesInterface::VALUE_FILE, $output->getType());
        $this->assertEquals(0, $output->getUid());
        $this->assertEquals('root', $output->getUser());
        $this->assertTrue($output->isFile());
    }
}

<?php

namespace Zcold\Settlement\Tests;


use PHPUnit\Framework\TestCase;
use Zcold\Settlement\Exceptions\InvalidArgumentException;
use Zcold\Settlement\Settlement;

class SettlementTest extends TestCase
{
    public function testSettlementWithInvalidTagId()
    {
        $settlement = new Settlement();

//        $this->ass
        $settlement->addData(100);
//
        $this->expectException(InvalidArgumentException::class);
//
        $this->expectErrorMessage('Invalid tagId(1,2,3,4,5)');
    }

    public function testSettlement()
    {
        $settlement = new Settlement();

        $settlement->addData(1);

        $this->assertTrue(true);
    }
}
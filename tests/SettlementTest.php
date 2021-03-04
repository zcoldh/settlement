<?php


namespace Zcold\Settlement\Tests;


use PHPUnit\Framework\TestCase;

class SettlementTest extends TestCase
{
    public function testSettlementWithInvalidTagId()
    {
        $settlement = settlementAddData(100);

        $this->expectException();

        $this->expectErrorMessage();
    }
}
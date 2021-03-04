<?php


namespace Zcold\Settlement\Models;



class SettlementByTimeModel extends BaseModel
{
    const TABLE_MINUTE = 'Settlement_minute';
    const TABLE_HOURS = 'Settlement_hours';
    const TABLE_DAY = 'Settlement_day';
    const TABLE_MONTH = 'Settlement_month';

    public static $tables = [
        self::TABLE_MINUTE => self::TABLE_MINUTE,
        self::TABLE_HOURS => self::TABLE_HOURS,
        self::TABLE_DAY => self::TABLE_DAY,
        self::TABLE_MONTH => self::TABLE_MONTH,
    ];
}
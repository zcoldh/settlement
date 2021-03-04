<?php


namespace Zcold\Settlement\Models;

class BuryingPointModel extends BaseModel
{
    protected $table = 'burying_point';

    const REGISTER_TAG = 1;
    const ORDER_TAG = 2;
    const PRODUCT_TAG = 3;
    const API_TAG = 4;
    const ERROR_TAG = 5;

    public static $tagArr = [
        self::REGISTER_TAG => '注册用户量',
        self::ORDER_TAG => '用户购买订单数',
        self::PRODUCT_TAG => '用户购买某商品数',
        self::API_TAG => 'api调用次数',
        self::ERROR_TAG => '某程序错误数',
    ];
}
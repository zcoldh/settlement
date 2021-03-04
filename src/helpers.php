<?php


if (! function_exists('settlementAddData')) {
    function settlementAddData($tagId, $data = null, $num = 1, $time = null){
        return \Zcold\Settlement\Settlement::getInstance()->addData();
    }
}
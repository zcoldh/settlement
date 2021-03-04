<?php


namespace Zcold\Settlement;

use Medoo\Medoo;
use Zcold\Settlement\Exceptions\InvalidArgumentException;
use Zcold\Settlement\Exceptions\SaveDataException;
use Zcold\Settlement\Models\BuryingPointModel;
use Zcold\Settlement\Models\SettlementByTimeModel;
use Zcold\Settlement\Traits\Singleton;

/**
 * 题目2
 * Class Settlement
 * @package Zcold\Settlement
 */
class Settlement
{
    use Singleton;

    /**
     * @param int $tagId 场景id
     * @param null $data 数据
     * @param int $num 次数
     * @param null $date_time 时间
     * @return
     */
    public function addData($tagId, $data = null, $num = 1, $date_time = null)
    {
        //场景是否存在判断
        if(!isset(BuryingPointModel::$tagArr[$tagId])){
            throw new InvalidArgumentException('Invalid tagId('.implode(',', array_keys(BuryingPointModel::$tagArr)).')');
        }

        //时间格式是否存在判断
        if(!empty($date_time) && !strtotime($date_time)){
            throw new InvalidArgumentException('Invalid time(yyyy-mm-dd hh:ii:ss)');
        }

        //默认当前时间
        if(empty($date_time)){
            $date_time = date('Y-m-d H:i:s');
        }

        //保存到埋点注册表
        $BuryingPointId = $this->saveBuryingPoint(
            BuryingPointModel::$tagArr[$tagId],
            $tagId
        );

        //保存到统计表
        $this->saveSettlementBy($BuryingPointId, $data, $num, $date_time);

        return true;
    }

    /**
     * 保存数据到埋点注册表
     * @param $title
     * @param $dataKey
     * @return Int
     * @throws SaveDataException
     */
    protected function saveBuryingPoint($title, $dataKey): Int
    {
        $BuryingPoint = new BuryingPointModel();

        $res = $BuryingPoint->insert([
            'title' => $title,
            'dataKey' => $dataKey
        ]);
        if($res === false){
            throw new SaveDataException('Db Error '.$BuryingPoint->getDb()->error());
        }

        return $BuryingPoint->getDb()->id();
    }

    /**
     * 保存至统计表
     * @param $BuryingPointId
     * @param $data
     * @param $date_time
     */
    protected function saveSettlementBy($BuryingPointId, $data, $num, $date_time)
    {
        $time_arr = $this->formatDateTime($date_time);

        $db = (new BuryingPointModel())->getDb();
        foreach ($time_arr as $k => $v){
            $table_name = SettlementByTimeModel::$tables[$k];

            $info = $db->get($table_name, ['id'], [
                'time' => $v
            ]);
            if(empty($info)){
                $db->insert($table_name, [
                    'time' => $v,
                    'burying_point_id' => $BuryingPointId,
                    'data' => $data,
                    'datatime' => date('Y-m-d H:i:s', $v),
                    'num' => $num,
                ]);
                continue;
            }

            $db->update($table_name, [
                'num' => Medoo::raw('num + 1')
            ], [
                'id' => $info['id'],
            ]);
        }
    }

    /**
     * 格式化时间
     * @param $date_time
     * @return array
     */
    protected function formatDateTime($date_time)
    {
        $timestamp = strtotime($date_time);

        return [
            SettlementByTimeModel::TABLE_MINUTE => strtotime(date('Y-m-d H:i', $timestamp)),
            SettlementByTimeModel::TABLE_HOURS => strtotime(date('Y-m-d H', $timestamp)),
            SettlementByTimeModel::TABLE_DAY => strtotime(date('Y-m-d', $timestamp)),
            SettlementByTimeModel::TABLE_MONTH => strtotime(date('Y-m', $timestamp)),
        ];
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RechargeCard extends Common
{
    protected $table = 'recharge_card';

    /** 获取充值卡列表 */
    public function lists()
    {
        $model = self::where(['status' => self::STATUS_ENABLE])->get();
        $data = [];
        foreach ($model as $item) {
            $data[] = [
                'id' => $item->id,
                'amount' => $item->amount,
                'gift_amount' => $item->gift_amount,
            ];
        }
        return $data;
    }

    public function getRechargeCard($where = [])
    {
        if ($model = self::where($where)->first()) {
            return $model;
        }
        self::showMsg('没有该充值卡', 4);
    }
}
<?php


namespace app\models;


class Audit extends \yii\db\ActiveRecord
{
    public function getShop()
    {
        return $this->hasOne(Shop::class, ['id' => 'audit_id']);
    }
}

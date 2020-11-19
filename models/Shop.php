<?php


namespace app\models;


use yii\db\ActiveRecord;

class Shop extends ActiveRecord
{
    const STATUS_ACTIVE = 'on';
    const STATUS_INACTIVE = 'off';

    public static function tableName()
    {
        return '{{%shops}}';
    }

    // Для простоты использована связь один к одному, но скорее всего это будет один к многим
    public function getAudit()
    {
        return $this->hasOne(Audit::class, ['shop_id' => 'id']);
    }

    public static function getOnShopsWithAudit()
    {
        return Shop::find()->with('audit')->where(['status' => Shop::STATUS_ACTIVE])->all();
    }

    public static function echoList()
    {
        $shops = Shop::getOnShopsWithAudit();

        if (@$shops) {
            foreach ($shops as $shop) {
                // Вывод конечно должен быть из контроллера, но такие условия задачи
                echo "{$shop->id}\t{$shop->name}\t{$shop->status}\t{$shop->audit->dt}\n";
            }
        } else echo "Нет данных";
    }
}

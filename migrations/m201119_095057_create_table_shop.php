<?php

use yii\db\Migration;

/**
 * Class m201119_095057_create_table_shop
 */
class m201119_095057_create_table_shop extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shops}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'status' => "ENUM('on', 'off')",
        ]);

        for ($i = 0; $i < 100; $i++) {
            $shops[] = ['Магазин ' . ($i+1), ['on','off'][rand(0,1)]];
        }
        $this->batchInsert('{{%shops}}', ['name', 'status'], $shops );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%shops}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201119_095057_shop cannot be reverted.\n";

        return false;
    }
    */
}

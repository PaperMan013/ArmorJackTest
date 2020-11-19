<?php

use yii\db\Migration;

/**
 * Class m201119_095115_create_table_audit
 */
class m201119_095115_create_table_audit extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%audit}}', [
            'id' => $this->primaryKey(),
            'shop_id' => $this->integer(),
            'dt' => $this->dateTime(),
        ]);

        for ($i = 0; $i < 100; $i++) {
            $audits[] = [$i+1, '2020-'.rand(1,11).'-'.rand(1,30).' '.rand(10,18).':'.rand(0,59).':00'];
        }
        $this->batchInsert('{{%audit}}', ['shop_id', 'dt'], $audits );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%audit}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201119_095115_audit cannot be reverted.\n";

        return false;
    }
    */
}

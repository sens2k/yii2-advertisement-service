<?php

use yii\db\Migration;

/**
 * Class m220902_071114_add_column_price_to_table_ad
 */
class m220902_071114_add_column_price_to_table_ad extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('ad', 'price', $this->integer()->notNull()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('ad', 'price');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220902_071114_add_column_price_to_table_ad cannot be reverted.\n";

        return false;
    }
    */
}

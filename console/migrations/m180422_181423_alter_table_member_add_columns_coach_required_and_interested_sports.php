<?php

use yii\db\Migration;

/**
 * Class m180422_181423_alter_table_member_add_columns_coach_required_and_interested_sports
 */
class m180422_181423_alter_table_member_add_columns_coach_required_and_interested_sports extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn('member', 'coach_required', 'smallint default 0 after phone');
		$this->addColumn('member', 'interested_sports', 'string after coach_required');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180422_181423_alter_table_member_add_columns_coach_required_and_interested_sports cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180422_181423_alter_table_member_add_columns_coach_required_and_interested_sports cannot be reverted.\n";

        return false;
    }
    */
}

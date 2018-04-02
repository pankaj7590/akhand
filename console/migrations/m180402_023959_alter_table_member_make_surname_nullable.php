<?php

use yii\db\Migration;

/**
 * Class m180402_023959_alter_table_member_make_surname_nullable
 */
class m180402_023959_alter_table_member_make_surname_nullable extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
		$this->alterColumn('member', 'surname', 'varchar(255)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180402_023959_alter_table_member_make_surname_nullable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_023959_alter_table_member_make_surname_nullable cannot be reverted.\n";

        return false;
    }
    */
}

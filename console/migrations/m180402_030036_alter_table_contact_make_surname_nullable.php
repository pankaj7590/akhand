<?php

use yii\db\Migration;

/**
 * Class m180402_030036_alter_table_contact_make_surname_nullable
 */
class m180402_030036_alter_table_contact_make_surname_nullable extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
		$this->alterColumn('contact', 'surname', 'varchar(255)');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180402_030036_alter_table_contact_make_surname_nullable cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_030036_alter_table_contact_make_surname_nullable cannot be reverted.\n";

        return false;
    }
    */
}

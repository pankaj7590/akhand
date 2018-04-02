<?php

use yii\db\Migration;

/**
 * Class m180402_030619_alter_table_contact_add_column_subject
 */
class m180402_030619_alter_table_contact_add_column_subject extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
		$this->addColumn('contact', 'phone', 'varchar(15) not null after email');
		$this->addColumn('contact', 'subject', 'varchar(255) not null after email');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180402_030619_alter_table_contact_add_column_subject cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180402_030619_alter_table_contact_add_column_subject cannot be reverted.\n";

        return false;
    }
    */
}

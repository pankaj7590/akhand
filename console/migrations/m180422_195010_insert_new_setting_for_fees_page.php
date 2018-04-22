<?php

use yii\db\Migration;

/**
 * Class m180422_195010_insert_new_setting_for_fees_page
 */
class m180422_195010_insert_new_setting_for_fees_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->insert('setting', [
			'setting_group' => 5,
			'name' => 'fees_page_content',
			'label' => 'Fees Page Content',
		]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180422_195010_insert_new_setting_for_fees_page cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180422_195010_insert_new_setting_for_fees_page cannot be reverted.\n";

        return false;
    }
    */
}

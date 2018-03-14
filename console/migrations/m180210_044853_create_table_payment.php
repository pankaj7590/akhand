<?php

use yii\db\Migration;

/**
 * Class m180210_044853_create_table_payment
 */
class m180210_044853_create_table_payment extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		
		$this->createTable("payment", [
			'id' => $this->primaryKey(),
			'member_id' => $this->integer()->notNull(),
			'email' => $this->string(),
			'mobile' => $this->string(),
			'tournament_id' => $this->integer(),
			'match_id' => $this->integer(),
			'amount' => $this->double()->notNull(),
			'status' => $this->smallInteger(),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_payment_member', 'payment', 'member_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_payment_tournament', 'payment', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_payment_match_id', 'payment', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_payment_member_created_by', 'payment', 'created_by', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_payment_member_updated_by', 'payment', 'updated_by', 'member', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180210_044853_create_table_payment cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180210_044853_create_table_payment cannot be reverted.\n";

        return false;
    }
    */
}

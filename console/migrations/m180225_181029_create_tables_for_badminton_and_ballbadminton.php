<?php

use yii\db\Migration;

/**
 * Class m180225_181029_create_tables_for_badminton_and_ballbadminton
 */
class m180225_181029_create_tables_for_badminton_and_ballbadminton extends Migration
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
		$this->createTable('organization_type', [
			'id' => $this->primaryKey(),
			'organization_id' => $this->integer()->notNull(),
			'type' => $this->smallInteger()->defaultValue(1)->notNull(),
			'status' => $this->smallInteger(),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		],$tableOptions);
		
		$this->addForeignKey('fk_organization_type_organization', 'organization_type', 'organization_id', 'organization', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_organization_type_user_created_by', 'organization_type', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_organization_type_user_updated_by', 'organization_type', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable('player_type', [
			'id' => $this->primaryKey(),
			'player_id' => $this->integer()->notNull(),
			'type' => $this->smallInteger()->defaultValue(1)->notNull(),
			'status' => $this->smallInteger(),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		],$tableOptions);
		
		$this->addForeignKey('fk_player_type_player', 'player_type', 'player_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_player_type_user_created_by', 'player_type', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_player_type_user_updated_by', 'player_type', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->addColumn('team', 'type', 'smallint default 1');
		$this->addColumn('tournament', 'level', 'smallint default 1');
		$this->addColumn('match', 'type', 'smallint default 1');
		
		$this->createTable("badminton_match", [
			'id' => $this->primaryKey(),
			'tournament_id' => $this->integer(),
			'first_team_id' => $this->integer()->notNull(),
			'second_team_id' => $this->integer()->notNull(),
			'winner_team_id' => $this->integer(),
			'first_team_points' => $this->integer(),
			'second_team_points' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_badminton_match_tournament', 'badminton_match', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_match_team_first', 'badminton_match', 'first_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_match_team_second', 'badminton_match', 'second_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_match_team_winner', 'badminton_match', 'winner_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_match_user_created_by', 'badminton_match', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_badminton_match_user_updated_by', 'badminton_match', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("badminton_match_player", [
			'id' => $this->primaryKey(),
			'match_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'player_id' => $this->integer()->notNull(),
			'services' => $this->integer(),
			'points_taken' => $this->integer(),
			'unforced_errors' => $this->integer(),
			'points_given' => $this->integer(),
			'out_services' => $this->integer(),
			'net_services' => $this->integer(),
			'faults' => $this->integer(),
			'double_faults' => $this->integer(),
			'rallies' => $this->integer(),
			'smashes' => $this->integer(),
			'net_drops' => $this->integer(),
			'returns' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_badminton_match_player_match', 'badminton_match_player', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_match_player_team', 'badminton_match_player', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_match_player_player', 'badminton_match_player', 'player_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_match_player_user_created_by', 'badminton_match_player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_badminton_match_player_user_updated_by', 'badminton_match_player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("badminton_inning_detail", [
			'id' => $this->primaryKey(),
			'match_id' => $this->integer()->notNull(),
			'set' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'server_id' => $this->integer()->notNull(),
			'receiver_id' => $this->integer()->notNull(),
			'over_type' => $this->integer(),
			'over_by' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_badminton_inning_detail_match', 'badminton_inning_detail', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_inning_detail_team', 'badminton_inning_detail', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_inning_detail_batsman', 'badminton_inning_detail', 'server_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_inning_detail_bowler', 'badminton_inning_detail', 'receiver_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_badminton_inning_detail_user_created_by', 'badminton_inning_detail', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_badminton_inning_detail_user_updated_by', 'badminton_inning_detail', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("ball_badminton_match", [
			'id' => $this->primaryKey(),
			'tournament_id' => $this->integer(),
			'first_team_id' => $this->integer()->notNull(),
			'second_team_id' => $this->integer()->notNull(),
			'winner_team_id' => $this->integer(),
			'first_team_points' => $this->integer(),
			'second_team_points' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_ball_badminton_match_tournament', 'ball_badminton_match', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_match_team_first', 'ball_badminton_match', 'first_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_match_team_second', 'ball_badminton_match', 'second_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_match_team_winner', 'ball_badminton_match', 'winner_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_match_user_created_by', 'ball_badminton_match', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_ball_badminton_match_user_updated_by', 'ball_badminton_match', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("ball_badminton_match_player", [
			'id' => $this->primaryKey(),
			'match_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'player_id' => $this->integer()->notNull(),
			'services' => $this->integer(),
			'points_taken' => $this->integer(),
			'unforced_errors' => $this->integer(),
			'points_given' => $this->integer(),
			'out_services' => $this->integer(),
			'net_services' => $this->integer(),
			'rallies' => $this->integer(),
			'smashes' => $this->integer(),
			'loops' => $this->integer(),
			'net_drops' => $this->integer(),
			'returns' => $this->integer(),
			'blocks' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_ball_badminton_match_player_match', 'ball_badminton_match_player', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_match_player_team', 'ball_badminton_match_player', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_match_player_player', 'ball_badminton_match_player', 'player_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_match_player_user_created_by', 'ball_badminton_match_player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_ball_badminton_match_player_user_updated_by', 'ball_badminton_match_player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("ball_badminton_inning_detail", [
			'id' => $this->primaryKey(),
			'match_id' => $this->integer()->notNull(),
			'set' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'server_id' => $this->integer()->notNull(),
			'receiver_id' => $this->integer()->notNull(),
			'over_type' => $this->integer(),
			'over_by' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_ball_badminton_inning_detail_match', 'ball_badminton_inning_detail', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_inning_detail_team', 'ball_badminton_inning_detail', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_inning_detail_batsman', 'ball_badminton_inning_detail', 'server_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_inning_detail_bowler', 'ball_badminton_inning_detail', 'receiver_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_ball_badminton_inning_detail_user_created_by', 'ball_badminton_inning_detail', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_ball_badminton_inning_detail_user_updated_by', 'ball_badminton_inning_detail', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180225_181029_create_tables_for_badminton_and_ballbadminton cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180225_181029_create_tables_for_badminton_and_ballbadminton cannot be reverted.\n";

        return false;
    }
    */
}

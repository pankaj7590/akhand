<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		
		$this->createTable("media",[
			'id' => $this->primaryKey(),
			'media_type' => $this->smallInteger(4),
			'alt' => $this->string(255),
			'file_name' => $this->string(255),
			'file_type' => $this->string(45),
			'file_size' => $this->integer(10),
			'status' => $this->smallInteger(),
			'created_at' => $this->integer(11),
			'updated_at' => $this->integer(11),
		], $tableOptions);

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
			'profile_picture' => $this->integer(),
            'name' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->string(20)->notNull(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
		
		$this->addForeignKey('fk_user_media', 'user', 'profile_picture', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_user_user_created_by', 'user', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_user_user_updated_by', 'user', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("contact", [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'surname' => $this->string()->notNull(),
			'email' => $this->string(),
			'feedback_type' => $this->smallInteger(),
			'message' => $this->text(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->createTable("gallery", [
			'id' => $this->primaryKey(),
			'name' => $this->string(),
			'description' => $this->text(),
			'type' => $this->smallInteger(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_gallery_user_created_by', 'gallery', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_gallery_user_updated_by', 'gallery', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("gallery_media", [
			'id' => $this->primaryKey(),
			'gallery_id' => $this->integer()->notNull(),
			'media_id' => $this->integer()->notNull(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_gallery_media_gallery', 'gallery_media', 'gallery_id', 'gallery', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_media_media', 'gallery_media', 'media_id', 'media', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_gallery_media_user_created_by', 'gallery_media', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_gallery_media_user_updated_by', 'gallery_media', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("setting", [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull()->unique(),
			'label' => $this->string()->notNull(),
			'default_value' => $this->text()->notNull(),
			'value' => $this->text()->notNull(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_setting_user_created_by', 'setting', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_setting_user_updated_by', 'setting', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("organization", [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'info' => $this->text(),
			'logo' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_organization_user_created_by', 'organization', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_organization_user_updated_by', 'organization', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_organization_media', 'organization', 'logo', 'media', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("member", [
            'id' => $this->primaryKey(),
			'profile_picture' => $this->integer(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'phone' => $this->string(20)->notNull(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_member_media', 'member', 'profile_picture', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_member_user_created_by', 'member', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_member_user_updated_by', 'member', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("organization_member", [
			'id' => $this->primaryKey(),
			'organization_id' => $this->integer()->notNull(),
			'member_id' => $this->integer()->notNull(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_organization_member_organization', 'organization_member', 'organization_id', 'organization', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_organization_member_member', 'organization_member', 'member_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_organization_member_user_created_by', 'organization_member', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_organization_member_user_updated_by', 'organization_member', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("team", [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'logo' => $this->integer(),
			
            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_team_media', 'team', 'logo', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_team_user_created_by', 'team', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_team_user_updated_by', 'team', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		
		$this->createTable("team_member", [
			'id' => $this->primaryKey(),
			'team_id' => $this->integer()->notNull(),
			'member_id' => $this->integer()->notNull(),
			'status' => $this->smallInteger(),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_team_member_team', 'team_member', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_team_member_member', 'team_member', 'member_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_team_member_user_created_by', 'team_member', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_team_member_user_updated_by', 'team_member', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("organization_team", [
			'id' => $this->primaryKey(),
			'organization_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_organization_team_organization', 'organization_team', 'organization_id', 'organization', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_organization_team_team', 'organization_team', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_organization_team_user_created_by', 'organization_team', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_organization_team_user_updated_by', 'organization_team', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("tournament", [
			'id' => $this->primaryKey(),
			'type' => $this->smallInteger()->notNull(),
			'name' => $this->string()->notNull(),
			'banner' => $this->integer(),
			'logo' => $this->integer(),
			'from_date' => $this->integer(),
			'to_date' => $this->integer(),
			'entry_fee' => $this->double(),
			'info' => $this->text(),
			'has_monetary_reward' => $this->smallInteger(),
			'monetary_reward' => $this->double(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_tournament_media_banner', 'tournament', 'banner', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_tournament_media_logo', 'tournament', 'logo', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_tournament_user_created_by', 'tournament', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_tournament_user_updated_by', 'tournament', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("tournament_team", [
			'id' => $this->primaryKey(),
			'tournament_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'entry_fee' => $this->double(),
			'is_paid' => $this->smallInteger(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_tournament_team_tournament', 'tournament_team', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_tournament_team_team', 'tournament_team', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_tournament_team_user_created_by', 'tournament_team', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_tournament_team_user_updated_by', 'tournament_team', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("match", [
			'id' => $this->primaryKey(),
			'tournament_id' => $this->integer(),
			'first_team_id' => $this->integer()->notNull(),
			'second_team_id' => $this->integer()->notNull(),
			'winner_team_id' => $this->integer(),
			'first_team_score' => $this->integer(),
			'first_team_wickets' => $this->integer(),
			'second_team_score' => $this->integer(),
			'second_team_wickets' => $this->integer(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		$this->addForeignKey('fk_match_tournament', 'match', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_team_first', 'match', 'first_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_team_second', 'match', 'second_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_team_winner', 'match', 'winner_team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_user_created_by', 'match', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_match_user_updated_by', 'match', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("match_player", [
			'id' => $this->primaryKey(),
			'match_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'player_id' => $this->integer()->notNull(),
			'balls_played' => $this->integer(),
			'runs_scored' => $this->integer(),
			'extra_runs' => $this->integer(),
			'wickets_taken' => $this->integer(),
			'wide_balls' => $this->integer(),
			'no_balls' => $this->integer(),
			'leg_byes' => $this->integer(),
			'sixes' => $this->integer(),
			'fours' => $this->integer(),
			'four_runs' => $this->integer(),
			'triples' => $this->integer(),
			'doubles' => $this->integer(),
			'singles' => $this->integer(),
			'batting_duration' => $this->integer(),
			'bowling_duration' => $this->integer(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_match_player_match', 'match_player', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_player_team', 'match_player', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_player_player', 'match_player', 'player_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_match_player_user_created_by', 'match_player', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_match_player_user_updated_by', 'match_player', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');		
		
		$this->createTable("tournament_match", [
			'id' => $this->primaryKey(),
			'tournament_id' => $this->integer()->notNull(),
			'match_id' => $this->integer()->notNull(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_tournament_match_tournament', 'tournament_match', 'tournament_id', 'tournament', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_tournament_match_match', 'tournament_match', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_tournament_match_user_created_by', 'tournament_match', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_tournament_match_user_updated_by', 'tournament_match', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("inning_detail", [
			'id' => $this->primaryKey(),
			'match_id' => $this->integer()->notNull(),
			'team_id' => $this->integer()->notNull(),
			'batsman_id' => $this->integer()->notNull(),
			'bowler_id' => $this->integer()->notNull(),
			'runs_scored' => $this->integer(),
			'extra_runs' => $this->integer(),
			'is_wicket' => $this->smallInteger(),
			'is_wide_ball' => $this->integer(),
			'is_no_ball' => $this->integer(),
			'is_leg_bye' => $this->integer(),
			'is_six' => $this->integer(),
			'is_four' => $this->integer(),
			'are_four_runs' => $this->integer(),
			'are_triples' => $this->integer(),
			'are_doubles' => $this->integer(),
			'are_singles' => $this->integer(),

            'status' => $this->smallInteger()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_inning_detail_match', 'inning_detail', 'match_id', 'match', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_inning_detail_team', 'inning_detail', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_inning_detail_batsman', 'inning_detail', 'batsman_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_inning_detail_bowler', 'inning_detail', 'bowler_id', 'member', 'id', 'CASCADE', 'CASCADE');
		$this->addForeignKey('fk_inning_detail_user_created_by', 'inning_detail', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_inning_detail_user_updated_by', 'inning_detail', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
		
		$this->createTable("news_event", [
			'id' => $this->primaryKey(),
			'title' => $this->string()->notNull(),
			'content' => $this->text()->notNull(),
			'photo' => $this->integer(),
			'news_event_date' => $this->integer(),
			'type' => $this->smallInteger(),
			'place' => $this->text(),
			
			'status' => $this->smallInteger(),
			'created_by' => $this->integer(),
			'updated_by' => $this->integer(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		], $tableOptions);
		
		$this->addForeignKey('fk_news_event_photo', 'news_event', 'photo', 'media', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_news_event_user_created_by', 'news_event', 'created_by', 'user', 'id', 'SET NULL', 'SET NULL');
		$this->addForeignKey('fk_news_event_user_updated_by', 'news_event', 'updated_by', 'user', 'id', 'SET NULL', 'SET NULL');
	}

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}

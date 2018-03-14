<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "match_player".
 *
 * @property int $id
 * @property int $match_id
 * @property int $team_id
 * @property int $player_id
 * @property int $balls_played
 * @property int $runs_scored
 * @property int $extra_runs
 * @property int $wickets_taken
 * @property int $wide_balls
 * @property int $no_balls
 * @property int $leg_byes
 * @property int $sixes
 * @property int $fours
 * @property int $four_runs
 * @property int $triples
 * @property int $doubles
 * @property int $singles
 * @property int $batting_duration
 * @property int $bowling_duration
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Match $match
 * @property Member $player
 * @property Team $team
 * @property User $createdBy
 * @property User $updatedBy
 */
class MatchPlayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'match_player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['match_id', 'team_id', 'player_id'], 'required'],
            [['match_id', 'team_id', 'player_id', 'balls_played', 'runs_scored', 'extra_runs', 'wickets_taken', 'wide_balls', 'no_balls', 'leg_byes', 'sixes', 'fours', 'four_runs', 'triples', 'doubles', 'singles', 'batting_duration', 'bowling_duration', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['match_id'], 'exist', 'skipOnError' => true, 'targetClass' => Match::className(), 'targetAttribute' => ['match_id' => 'id']],
            [['player_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['player_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
	
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
			'blameable' => [
				'class' => BlameableBehavior::className(),
			],
		];
	}

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'match_id' => 'Match',
            'team_id' => 'Team',
            'player_id' => 'Player',
            'balls_played' => 'Balls Played',
            'runs_scored' => 'Runs Scored',
            'extra_runs' => 'Extra Runs',
            'wickets_taken' => 'Wickets Taken',
            'wide_balls' => 'Wide Balls',
            'no_balls' => 'No Balls',
            'leg_byes' => 'Leg Byes',
            'sixes' => 'Sixes',
            'fours' => 'Fours',
            'four_runs' => 'Four Runs',
            'triples' => 'Triples',
            'doubles' => 'Doubles',
            'singles' => 'Singles',
            'batting_duration' => 'Batting Duration',
            'bowling_duration' => 'Bowling Duration',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatch()
    {
        return $this->hasOne(Match::className(), ['id' => 'match_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayer()
    {
        return $this->hasOne(Member::className(), ['id' => 'player_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}

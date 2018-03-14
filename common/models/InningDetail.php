<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "inning_detail".
 *
 * @property int $id
 * @property int $match_id
 * @property int $team_id
 * @property int $batsman_id
 * @property int $bowler_id
 * @property int $runs_scored
 * @property int $extra_runs
 * @property int $is_wicket
 * @property int $is_wide_ball
 * @property int $is_no_ball
 * @property int $is_leg_bye
 * @property int $is_six
 * @property int $is_four
 * @property int $are_four_runs
 * @property int $are_triples
 * @property int $are_doubles
 * @property int $are_singles
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Member $batsman
 * @property Member $bowler
 * @property Match $match
 * @property Team $team
 * @property User $createdBy
 * @property User $updatedBy
 */
class InningDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inning_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['match_id', 'team_id', 'batsman_id', 'bowler_id'], 'required'],
            [['match_id', 'team_id', 'batsman_id', 'bowler_id', 'runs_scored', 'extra_runs', 'is_wicket', 'is_wide_ball', 'is_no_ball', 'is_leg_bye', 'is_six', 'is_four', 'are_four_runs', 'are_triples', 'are_doubles', 'are_singles', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['batsman_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['batsman_id' => 'id']],
            [['bowler_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['bowler_id' => 'id']],
            [['match_id'], 'exist', 'skipOnError' => true, 'targetClass' => Match::className(), 'targetAttribute' => ['match_id' => 'id']],
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
            'batsman_id' => 'Batsman',
            'bowler_id' => 'Bowler',
            'runs_scored' => 'Runs Scored',
            'extra_runs' => 'Extra Runs',
            'is_wicket' => 'Is Wicket',
            'is_wide_ball' => 'Is Wide Ball',
            'is_no_ball' => 'Is No Ball',
            'is_leg_bye' => 'Is Leg Bye',
            'is_six' => 'Is Six',
            'is_four' => 'Is Four',
            'are_four_runs' => 'Are Four Runs',
            'are_triples' => 'Are Triples',
            'are_doubles' => 'Are Doubles',
            'are_singles' => 'Are Singles',
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
    public function getBatsman()
    {
        return $this->hasOne(Member::className(), ['id' => 'batsman_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBowler()
    {
        return $this->hasOne(Member::className(), ['id' => 'bowler_id']);
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

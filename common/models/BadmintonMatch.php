<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "badminton_match".
 *
 * @property int $id
 * @property int $tournament_id
 * @property int $first_team_id
 * @property int $second_team_id
 * @property int $winner_team_id
 * @property int $first_team_points
 * @property int $second_team_points
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $updatedBy
 * @property Team $firstTeam
 * @property Team $secondTeam
 * @property Team $winnerTeam
 * @property Tournament $tournament
 * @property User $createdBy
 */
class BadmintonMatch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'badminton_match';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tournament_id', 'first_team_id', 'second_team_id', 'winner_team_id', 'first_team_points', 'second_team_points', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['first_team_id', 'second_team_id'], 'required'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['first_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['first_team_id' => 'id']],
            [['second_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['second_team_id' => 'id']],
            [['winner_team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['winner_team_id' => 'id']],
            [['tournament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tournament::className(), 'targetAttribute' => ['tournament_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
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
            'tournament_id' => 'Tournament',
            'first_team_id' => 'First Team',
            'second_team_id' => 'Second Team',
            'winner_team_id' => 'Winner Team',
            'first_team_points' => 'First Team Points',
            'second_team_points' => 'Second Team Points',
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
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFirstTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'first_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecondTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'second_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWinnerTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'winner_team_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournament()
    {
        return $this->hasOne(Tournament::className(), ['id' => 'tournament_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}

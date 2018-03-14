<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "ball_badminton_match_player".
 *
 * @property int $id
 * @property int $match_id
 * @property int $team_id
 * @property int $player_id
 * @property int $services
 * @property int $points_taken
 * @property int $unforced_errors
 * @property int $points_given
 * @property int $out_services
 * @property int $net_services
 * @property int $rallies
 * @property int $smashes
 * @property int $loops
 * @property int $net_drops
 * @property int $returns
 * @property int $blocks
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $updatedBy
 * @property Match $match
 * @property Member $player
 * @property Team $team
 * @property User $createdBy
 */
class BallBadmintonMatchPlayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ball_badminton_match_player';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['match_id', 'team_id', 'player_id'], 'required'],
            [['match_id', 'team_id', 'player_id', 'services', 'points_taken', 'unforced_errors', 'points_given', 'out_services', 'net_services', 'rallies', 'smashes', 'loops', 'net_drops', 'returns', 'blocks', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['match_id'], 'exist', 'skipOnError' => true, 'targetClass' => Match::className(), 'targetAttribute' => ['match_id' => 'id']],
            [['player_id'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['player_id' => 'id']],
            [['team_id'], 'exist', 'skipOnError' => true, 'targetClass' => Team::className(), 'targetAttribute' => ['team_id' => 'id']],
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
            'match_id' => 'Match',
            'team_id' => 'Team',
            'player_id' => 'Player',
            'services' => 'Services',
            'points_taken' => 'Points Taken',
            'unforced_errors' => 'Unforced Errors',
            'points_given' => 'Points Given',
            'out_services' => 'Out Services',
            'net_services' => 'Net Services',
            'rallies' => 'Rallies',
            'smashes' => 'Smashes',
            'loops' => 'Loops',
            'net_drops' => 'Net Drops',
            'returns' => 'Returns',
            'blocks' => 'Blocks',
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
}

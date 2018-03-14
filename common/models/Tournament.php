<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "tournament".
 *
 * @property int $id
 * @property int $type
 * @property string $name
 * @property int $banner
 * @property int $logo
 * @property int $from_date
 * @property int $to_date
 * @property double $entry_fee
 * @property string $info
 * @property int $has_monetary_reward
 * @property double $monetary_reward
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property int $level
 *
 * @property BadmintonMatch[] $badmintonMatches
 * @property BallBadmintonMatch[] $ballBadmintonMatches
 * @property Match[] $matches
 * @property Payment[] $payments
 * @property Media $banner0
 * @property Media $logo0
 * @property User $createdBy
 * @property User $updatedBy
 * @property TournamentMatch[] $tournamentMatches
 * @property TournamentTeam[] $tournamentTeams
 */
class Tournament extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tournament';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['type', 'banner', 'logo', 'from_date', 'to_date', 'has_monetary_reward', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'level'], 'integer'],
            [['entry_fee', 'monetary_reward'], 'number'],
            [['info'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['banner'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['banner' => 'id']],
            [['logo'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['logo' => 'id']],
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
            'type' => 'Type',
            'name' => 'Name',
            'banner' => 'Banner',
            'logo' => 'Logo',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'entry_fee' => 'Entry Fee',
            'info' => 'Info',
            'has_monetary_reward' => 'Has Monetary Reward',
            'monetary_reward' => 'Monetary Reward',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonMatches()
    {
        return $this->hasMany(BadmintonMatch::className(), ['tournament_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonMatches()
    {
        return $this->hasMany(BallBadmintonMatch::className(), ['tournament_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatches()
    {
        return $this->hasMany(Match::className(), ['tournament_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['tournament_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanner0()
    {
        return $this->hasOne(Media::className(), ['id' => 'banner']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogo0()
    {
        return $this->hasOne(Media::className(), ['id' => 'logo']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentMatches()
    {
        return $this->hasMany(TournamentMatch::className(), ['tournament_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentTeams()
    {
        return $this->hasMany(TournamentTeam::className(), ['tournament_id' => 'id']);
    }
}

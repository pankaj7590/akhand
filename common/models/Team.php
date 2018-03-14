<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "team".
 *
 * @property int $id
 * @property string $name
 * @property int $logo
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 * @property int $type
 *
 * @property BadmintonInningDetail[] $badmintonInningDetails
 * @property BadmintonMatch[] $badmintonMatches
 * @property BadmintonMatch[] $badmintonMatches0
 * @property BadmintonMatch[] $badmintonMatches1
 * @property BadmintonMatchPlayer[] $badmintonMatchPlayers
 * @property BallBadmintonInningDetail[] $ballBadmintonInningDetails
 * @property BallBadmintonMatch[] $ballBadmintonMatches
 * @property BallBadmintonMatch[] $ballBadmintonMatches0
 * @property BallBadmintonMatch[] $ballBadmintonMatches1
 * @property BallBadmintonMatchPlayer[] $ballBadmintonMatchPlayers
 * @property InningDetail[] $inningDetails
 * @property Match[] $matches
 * @property Match[] $matches0
 * @property Match[] $matches1
 * @property MatchPlayer[] $matchPlayers
 * @property OrganizationTeam[] $organizationTeams
 * @property Media $logo0
 * @property User $createdBy
 * @property User $updatedBy
 * @property TeamMember[] $teamMembers
 * @property TournamentTeam[] $tournamentTeams
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['logo', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'type'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'logo' => 'Logo',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonInningDetails()
    {
        return $this->hasMany(BadmintonInningDetail::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonMatches()
    {
        return $this->hasMany(BadmintonMatch::className(), ['first_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonMatches0()
    {
        return $this->hasMany(BadmintonMatch::className(), ['second_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonMatches1()
    {
        return $this->hasMany(BadmintonMatch::className(), ['winner_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonMatchPlayers()
    {
        return $this->hasMany(BadmintonMatchPlayer::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonInningDetails()
    {
        return $this->hasMany(BallBadmintonInningDetail::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonMatches()
    {
        return $this->hasMany(BallBadmintonMatch::className(), ['first_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonMatches0()
    {
        return $this->hasMany(BallBadmintonMatch::className(), ['second_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonMatches1()
    {
        return $this->hasMany(BallBadmintonMatch::className(), ['winner_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonMatchPlayers()
    {
        return $this->hasMany(BallBadmintonMatchPlayer::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInningDetails()
    {
        return $this->hasMany(InningDetail::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatches()
    {
        return $this->hasMany(Match::className(), ['first_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatches0()
    {
        return $this->hasMany(Match::className(), ['second_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatches1()
    {
        return $this->hasMany(Match::className(), ['winner_team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatchPlayers()
    {
        return $this->hasMany(MatchPlayer::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationTeams()
    {
        return $this->hasMany(OrganizationTeam::className(), ['team_id' => 'id']);
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
    public function getTeamMembers()
    {
        return $this->hasMany(TeamMember::className(), ['team_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTournamentTeams()
    {
        return $this->hasMany(TournamentTeam::className(), ['team_id' => 'id']);
    }
}

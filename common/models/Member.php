<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
use common\components\MediaUploader;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property int $profile_picture
 * @property string $name
 * @property string $surname
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property BadmintonInningDetail[] $badmintonInningDetails
 * @property BadmintonInningDetail[] $badmintonInningDetails0
 * @property BadmintonMatchPlayer[] $badmintonMatchPlayers
 * @property BallBadmintonInningDetail[] $ballBadmintonInningDetails
 * @property BallBadmintonInningDetail[] $ballBadmintonInningDetails0
 * @property BallBadmintonMatchPlayer[] $ballBadmintonMatchPlayers
 * @property InningDetail[] $inningDetails
 * @property InningDetail[] $inningDetails0
 * @property MatchPlayer[] $matchPlayers
 * @property Media $profilePicture
 * @property User $createdBy
 * @property User $updatedBy
 * @property OrganizationMember[] $organizationMembers
 * @property Payment[] $payments
 * @property Payment[] $payments0
 * @property Payment[] $payments1
 * @property PlayerType[] $playerTypes
 * @property TeamMember[] $teamMembers
 */
class Member extends \yii\db\ActiveRecord implements IdentityInterface
{
	public $profilePictureFile, $password;
	
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_picture', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'username', 'auth_key', 'password_hash', 'email', 'phone'], 'required'],
            [['name', 'surname', 'username', 'password_hash', 'password_reset_token', 'email', 'password'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 20],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['profile_picture'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['profile_picture' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['profilePictureFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
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
            'profile_picture' => 'Profile Picture',
            'name' => 'Name',
            'surname' => 'Surname',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'profilePictureFile' => 'Profile Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonInningDetails()
    {
        return $this->hasMany(BadmintonInningDetail::className(), ['server_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonInningDetails0()
    {
        return $this->hasMany(BadmintonInningDetail::className(), ['receiver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBadmintonMatchPlayers()
    {
        return $this->hasMany(BadmintonMatchPlayer::className(), ['player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonInningDetails()
    {
        return $this->hasMany(BallBadmintonInningDetail::className(), ['server_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonInningDetails0()
    {
        return $this->hasMany(BallBadmintonInningDetail::className(), ['receiver_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBallBadmintonMatchPlayers()
    {
        return $this->hasMany(BallBadmintonMatchPlayer::className(), ['player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInningDetails()
    {
        return $this->hasMany(InningDetail::className(), ['batsman_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInningDetails0()
    {
        return $this->hasMany(InningDetail::className(), ['bowler_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatchPlayers()
    {
        return $this->hasMany(MatchPlayer::className(), ['player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfilePicture()
    {
        return $this->hasOne(Media::className(), ['id' => 'profile_picture']);
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
    public function getOrganizationMembers()
    {
        return $this->hasMany(OrganizationMember::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['member_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments0()
    {
        return $this->hasMany(Payment::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments1()
    {
        return $this->hasMany(Payment::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlayerTypes()
    {
        return $this->hasMany(PlayerType::className(), ['player_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamMembers()
    {
        return $this->hasMany(TeamMember::className(), ['member_id' => 'id']);
    }
	
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
			if(!$insert && $this->password){
				$this->setPassword($this->password);
				$this->generateAuthKey();
			}
			$image = UploadedFile::getInstance($this, 'profilePictureFile');
			if($image){
				if($image != null && !$image->getHasError()) {
					if($mediaDetails = MediaUploader::uploadFiles($image)){
						$this->profile_picture = $mediaDetails['media_id'];
					}
				}
			}
            return true;
        } else {
            return false;
        }
    }
}

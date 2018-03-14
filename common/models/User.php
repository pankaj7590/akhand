<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
use common\components\MediaUploader;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
	public $profilePictureFile, $password;
	
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
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
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['profilePictureFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png'],
			[['profile_picture', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
			[['name', 'username', 'password_hash', 'email', 'phone'], 'required'],
			[['name', 'username', 'password_hash', 'password_reset_token', 'email', 'password'], 'string', 'max' => 255],
			[['auth_key'], 'string', 'max' => 32],
			[['phone'], 'string', 'max' => 20],
			[['username'], 'unique'],
			[['email'], 'unique'],
			[['phone'], 'unique'],
			[['password_reset_token'], 'unique'],
			[['profile_picture'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['profile_picture' => 'id']],
			[['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
			[['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'profilePictureFile' => 'Profile Picture',
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
	
	public function getFullname(){
		return ($this->name?$this->name:($this->username?$this->username:$this->email));
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
	
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBadmintonInningDetails()
   {
       return $this->hasMany(BadmintonInningDetail::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBadmintonInningDetails0()
   {
       return $this->hasMany(BadmintonInningDetail::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBadmintonMatches()
   {
       return $this->hasMany(BadmintonMatch::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBadmintonMatches0()
   {
       return $this->hasMany(BadmintonMatch::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBadmintonMatchPlayers()
   {
       return $this->hasMany(BadmintonMatchPlayer::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBadmintonMatchPlayers0()
   {
       return $this->hasMany(BadmintonMatchPlayer::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBallBadmintonInningDetails()
   {
       return $this->hasMany(BallBadmintonInningDetail::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBallBadmintonInningDetails0()
   {
       return $this->hasMany(BallBadmintonInningDetail::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBallBadmintonMatches()
   {
       return $this->hasMany(BallBadmintonMatch::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBallBadmintonMatches0()
   {
       return $this->hasMany(BallBadmintonMatch::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBallBadmintonMatchPlayers()
   {
       return $this->hasMany(BallBadmintonMatchPlayer::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBallBadmintonMatchPlayers0()
   {
       return $this->hasMany(BallBadmintonMatchPlayer::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleries()
   {
       return $this->hasMany(Gallery::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleries0()
   {
       return $this->hasMany(Gallery::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleryMedia()
   {
       return $this->hasMany(GalleryMedia::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleryMedia0()
   {
       return $this->hasMany(GalleryMedia::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getInningDetails()
   {
       return $this->hasMany(InningDetail::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getInningDetails0()
   {
       return $this->hasMany(InningDetail::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMatches()
   {
       return $this->hasMany(Match::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMatches0()
   {
       return $this->hasMany(Match::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMatchPlayers()
   {
       return $this->hasMany(MatchPlayer::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMatchPlayers0()
   {
       return $this->hasMany(MatchPlayer::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMembers()
   {
       return $this->hasMany(Member::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMembers0()
   {
       return $this->hasMany(Member::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getNewsEvents()
   {
       return $this->hasMany(NewsEvent::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getNewsEvents0()
   {
       return $this->hasMany(NewsEvent::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizations()
   {
       return $this->hasMany(Organization::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizations0()
   {
       return $this->hasMany(Organization::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizationMembers()
   {
       return $this->hasMany(OrganizationMember::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizationMembers0()
   {
       return $this->hasMany(OrganizationMember::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizationTeams()
   {
       return $this->hasMany(OrganizationTeam::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizationTeams0()
   {
       return $this->hasMany(OrganizationTeam::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizationTypes()
   {
       return $this->hasMany(OrganizationType::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrganizationTypes0()
   {
       return $this->hasMany(OrganizationType::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getPlayerTypes()
   {
       return $this->hasMany(PlayerType::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getPlayerTypes0()
   {
       return $this->hasMany(PlayerType::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getSettings()
   {
       return $this->hasMany(Setting::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getSettings0()
   {
       return $this->hasMany(Setting::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTeams()
   {
       return $this->hasMany(Team::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTeams0()
   {
       return $this->hasMany(Team::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTeamMembers()
   {
       return $this->hasMany(TeamMember::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTeamMembers0()
   {
       return $this->hasMany(TeamMember::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTournaments()
   {
       return $this->hasMany(Tournament::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTournaments0()
   {
       return $this->hasMany(Tournament::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTournamentMatches()
   {
       return $this->hasMany(TournamentMatch::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTournamentMatches0()
   {
       return $this->hasMany(TournamentMatch::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTournamentTeams()
   {
       return $this->hasMany(TournamentTeam::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getTournamentTeams0()
   {
       return $this->hasMany(TournamentTeam::className(), ['updated_by' => 'id']);
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
   public function getUsers()
   {
       return $this->hasMany(User::className(), ['created_by' => 'id']);
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
   public function getUsers0()
   {
       return $this->hasMany(User::className(), ['updated_by' => 'id']);
   }
}
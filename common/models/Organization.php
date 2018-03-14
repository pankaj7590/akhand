<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;
use common\components\MediaUploader;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $name
 * @property string $info
 * @property int $logo
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Media $logo0
 * @property User $createdBy
 * @property User $updatedBy
 * @property OrganizationMember[] $organizationMembers
 * @property OrganizationTeam[] $organizationTeams
 * @property OrganizationType[] $organizationTypes
 */
class Organization extends \yii\db\ActiveRecord
{
	public $temp_types, $logoFile;
	
	const TYPE_BADMINTON = 1;
	const TYPE_BALL_BADMINTON = 2;
	const TYPE_CRICKET = 3;
	
	public static $types = [
		self::TYPE_BADMINTON => 'Badminton',
		self::TYPE_BALL_BADMINTON => 'Ball Badminton',
		self::TYPE_CRICKET => 'Cricket',
	];
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['info'], 'string'],
            [['logo', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['logo'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['logo' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
			[['temp_types'], 'safe'],
            [['logoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png'],
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
            'info' => 'Information',
            'logo' => 'Logo',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'temp_types' => 'Types',
            'logoFile' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationLogo()
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
    public function getOrganizationMembers()
    {
        return $this->hasMany(OrganizationMember::className(), ['organization_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationTeams()
    {
        return $this->hasMany(OrganizationTeam::className(), ['organization_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizationTypes()
    {
        return $this->hasMany(OrganizationType::className(), ['organization_id' => 'id']);
    }
	
	public function afterSave($insert, $changedAttributes){
		if($this->temp_types){
			//get all previous types for the organization
			$previousTypes = $this->organizationTypes;
			foreach($previousTypes as $pt){
				if(!in_array($pt->type, $this->temp_types)){
					$pt->delete();
				}
			}
			//save new types; no need to care about duplication as unique validator is applied for organization id and type combination
			foreach($this->temp_types as $type){
				$organizationType = new OrganizationType();
				$organizationType->organization_id = $this->id;
				$organizationType->type = $type;
				$organizationType->save();
			}
		}
		return parent::afterSave($insert, $changedAttributes);
	}
	
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
			$image = UploadedFile::getInstance($this, 'logoFile');
			if($image){
				if($image != null && !$image->getHasError()) {
					if($mediaDetails = MediaUploader::uploadFiles($image)){
						$this->updateAttributes(['logo' => $mediaDetails['media_id']]);
					}
				}
			}
            return true;
        } else {
            return false;
        }
    }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;
use common\components\MediaUploader;

/**
 * This is the model class for table "news_event".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $photo
 * @property int $news_event_date
 * @property int $type
 * @property string $place
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Media $photo0
 * @property User $createdBy
 * @property User $updatedBy
 */
class NewsEvent extends \yii\db\ActiveRecord
{
	public $photoFile;
	
	const TYPE_NEWS = 1;
	const TYPE_EVENT = 2;
	
	public static $types = [
		self::TYPE_NEWS => 'News',
		self::TYPE_EVENT => 'Event',
	];
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content', 'place'], 'string'],
            [['photo', 'news_event_date', 'type', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['photo'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['photo' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
			[['type'], 'in', 'range' => [self::TYPE_EVENT, self::TYPE_NEWS]],
            [['photoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png'],
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
            'title' => 'Title',
            'content' => 'Content',
            'photo' => 'Photo',
            'photoFile' => 'Photo',
            'news_event_date' => 'Date',
            'type' => 'Type',
            'place' => 'Place',
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
    public function getNewsEventPhoto()
    {
        return $this->hasOne(Media::className(), ['id' => 'photo']);
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
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
			$image = UploadedFile::getInstance($this, 'photoFile');
			if($image){
				if($image != null && !$image->getHasError()) {
					if($mediaDetails = MediaUploader::uploadFiles($image)){
						$this->updateAttributes(['photo' => $mediaDetails['media_id']]);
					}
				}
			}
            return true;
        } else {
            return false;
        }
    }
}

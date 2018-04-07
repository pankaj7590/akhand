<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property int $setting_group
 * @property string $name
 * @property string $label
 * @property string $default_value
 * @property string $value
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Setting extends \yii\db\ActiveRecord
{
	const GROUP_HEADER = 1;
	const GROUP_FOOTER = 2;
	const GROUP_HOME = 3;
	const GROUP_CONTACT = 4;
	
	public static $groups = [
		self::GROUP_HEADER => 'Header',
		self::GROUP_FOOTER => 'Footer',
		self::GROUP_HOME => 'Home Page',
		self::GROUP_CONTACT => 'Contact Page',
	];
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'label'], 'required'],
            [['name'], 'unique'],
            [['default_value', 'value'], 'string'],
            [['status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'setting_group'], 'integer'],
            [['name', 'label'], 'string', 'max' => 255],
            [['name'], 'unique'],
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
            'label' => 'Label',
            'default_value' => 'Default Value',
            'value' => 'Value',
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
	
	public function getMedia(){
		return $this->hasOne(Media::className(), ['id' => 'value']);
	}
}

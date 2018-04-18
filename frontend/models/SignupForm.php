<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Member;
use common\models\User;
use common\models\Organization;
use common\models\OrganizationMember;
use yii\web\ServerErrorHttpException;
use yii\web\NotFoundHttpException;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $phone;
    public $username;
    public $email;
    public $password;
    public $organization;
    public $captcha;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Member', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
			
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Member', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 15],
            ['phone', 'unique', 'targetClass' => '\common\models\Member', 'message' => 'This phone number has already been taken.'],
			
            ['captcha', 'required'],
            ['captcha', 'captcha'],
			
            ['organization', 'required'],
            [['organization'], 'integer'],
            ['organization', 'exist',
                'targetClass' => '\common\models\Organization',
                // 'filter' => ['status' => Organization::STATUS_ACTIVE],
                'message' => 'Organization does not exist.',
				'targetAttribute' => ['organization' => 'id']
            ],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
		$transaction = Yii::$app->db->beginTransaction();
		try{
			$member = new Member();
			$member->username = $this->username;
			$member->name = $this->name;
			$member->phone = $this->phone;
			$member->email = $this->email;
			$member->setPassword($this->password);
			$member->generateAuthKey();
			if($member->save()){
				$organizationModel = Organization::findOne($this->organization);
				if(!$organizationModel){
					throw new NotFoundHttpException('Organization not found.');
				}
				$organizationMember = new OrganizationMember();
				$organizationMember->organization_id = $organizationModel->id;
				$organizationMember->member_id = $member->id;
				$organizationMember->status = OrganizationMember::STATUS_REQUESTED;
				if(!$organizationMember->save()){
					Yii::$app->session->setFlash('error', json_encode($organizationMember->getErrors()));
					throw new ServerErrorHttpException('Organization member not saved. Please try again.');
				}else{
					$transaction->commit();
					return $member;
				}
			}else{
				Yii::$app->session->setFlash('error', json_encode($member->getErrors()));
				throw new ServerErrorHttpException('Member not saved. Please try again.');
			}
		}catch(Exception $e){
			$transaction->rollBack();
			throw new ServerErrorHttpException('Something went wrong. Please try again.');
		}
		return NULL;
    }
}

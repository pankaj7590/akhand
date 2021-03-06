<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Contact;
use common\models\Organization;
use common\models\Match;
use common\models\BadmintonMatch;
use common\models\BallBadmintonMatch;
use common\models\Member;
use common\models\NewsEvent;
use common\models\search\GallerySearch;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'profile'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = 'home';
		$recentCricketMatches = Match::find()->limit(2)->orderBy('created_at desc')->all();
		$recentBadmintonMatches = BadmintonMatch::find()->limit(2)->orderBy('created_at desc')->all();
		$recentBallbadmintonMatches = BallBadmintonMatch::find()->limit(2)->orderBy('created_at desc')->all();
		
		$players = Member::find()->limit(8)->all();
		
		$recentNews = NewsEvent::find()->where(['type' => NewsEvent::TYPE_NEWS])->orderBy('created_at desc')->limit(5)->all();
        return $this->render('index', [
			'recentCricketMatches' => $recentCricketMatches,
			'recentBadmintonMatches' => $recentBadmintonMatches,
			'recentBallbadmintonMatches' => $recentBallbadmintonMatches,
			'players' => $players,
			'recentNews' => $recentNews,
		]);
    }
	
    public function actionMatches()
    {
        return $this->render('matches');
    }
	
    public function actionStaff()
    {
        return $this->render('staff');
    }
	
    public function actionNews()
    {
        return $this->render('news');
    }
	
    public function actionNewsSingle()
    {
        return $this->render('news-single');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$contact = new Contact();
			$contact->feedback_type = Contact::TYPE_CONTACT;
			$contact->name = $model->name;
			$contact->email = $model->email;
			$contact->phone = $model->phone;
			$contact->subject = $model->subject;
			$contact->message = $model->body;
			$contact->save();
			
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
		$organizationModels = Organization::find()->all();
		$organizations = [];
		foreach($organizationModels as $organization){
			$organizations[$organization->id] = $organization->name;
		}
		
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
            'organizations' => $organizations,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
	
	public function actionGallery(){
		$searchModel = new GallerySearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		return $this->render('gallery', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}
	
	public function actionProfile(){
		$memberModel = $this->findMember(Yii::$app->user->id);
		$memberModel->detachBehavior('blameable');
					
		if($memberModel->load(Yii::$app->request->post()) && $memberModel->save()){
			return $this->redirect(['profile']);
		}
		return $this->render('profile',[
            'model' => $memberModel,
        ]);
	}

    /**
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findMember($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested member record does not exist.');
    }
	
	public function actionFees(){
		return $this->render('fees');
	}
}

<?php

namespace backend\controllers;

use Yii;
use common\models\Setting;
use common\models\search\SettingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\MediaTypes;
use common\components\MediaUploader;
use yii\web\UploadedFile;

/**
 * SettingController implements the CRUD actions for Setting model.
 */
class SettingController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Setting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setting model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Setting model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Setting();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Setting model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Setting model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Lists all Theme Setting models.
     * @return mixed
     */
    public function actionThemeOptions()
    {
        $searchModel = new SettingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		//header options
		$headerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HEADER])->all();
		$headerOptions = [];
		foreach($headerOptionModels as $model){
			$headerOptions[$model->name] = $model;
		}
		//footer options
		$footerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_FOOTER])->all();
		$footerOptions = [];
		foreach($footerOptionModels as $model){
			$footerOptions[$model->name] = $model;
		}
		// echo "<pre>";print_r($footerOptions);exit;
		//home page options
		$homePageOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HOME])->all();
		$homePageOptions = [];
		foreach($homePageOptionModels as $model){
			$homePageOptions[$model->name] = $model;
		}
		//home page options
		$contactPageOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_CONTACT])->all();
		$contactPageOptions = [];
		foreach($contactPageOptionModels as $model){
			$contactPageOptions[$model->name] = $model;
		}
		
		//fees page options
		$feesPageOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_FEES])->all();
		$feesPageOptions = [];
		foreach($feesPageOptionModels as $model){
			$feesPageOptions[$model->name] = $model;
		}
		if(Yii::$app->request->post()){
			$sent_options = Yii::$app->request->post();
			
			//SAVING HOME PAGE SLIDER SLIDES
			$file = UploadedFile::getInstanceByName('home_page_main_slider_bg');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$home_page_main_slider_bg_model = Setting::findOne(['name' => 'home_page_main_slider_bg']);
					$home_page_main_slider_bg_model->value = strval($mediaDetails['media_id']);
					if(!$home_page_main_slider_bg_model->default_value){
						$home_page_main_slider_bg_model->default_value = $home_page_main_slider_bg_model->value;
					}
					$home_page_main_slider_bg_model->save();
				}
			}
			
			$sponsor_logos = UploadedFile::getInstancesByName('home_page_sponsors_slider_logos');
			$logos = [];
			foreach ($sponsor_logos as $k => $v) {
				if ($v != null && !$v->getHasError()) {
					$type = MediaTypes::THEME_OPTION;
					$mediaDetails = MediaUploader::uploadFiles($v, $type);
					if ($mediaDetails) {
						$logos[] = $mediaDetails['media_id'];
					}
				}
			}
			if(count($logos)){
				$home_page_sponsors_slider_logos_model = Setting::findOne(['name' => 'home_page_sponsors_slider_logos']);
				$home_page_sponsors_slider_logos_model->value = json_encode($logos);
					if(!$home_page_sponsors_slider_logos_model->default_value){
						$home_page_sponsors_slider_logos_model->default_value = $home_page_sponsors_slider_logos_model->value;
					}
				$home_page_sponsors_slider_logos_model->save();
			}
			
			$file = UploadedFile::getInstanceByName('home_page_success_story_image');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$home_page_success_story_image_model = Setting::findOne(['name' => 'home_page_success_story_image']);
					$home_page_success_story_image_model->value = strval($mediaDetails['media_id']);
					if(!$home_page_success_story_image_model->default_value){
						$home_page_success_story_image_model->default_value = $home_page_success_story_image_model->value;
					}
					$home_page_success_story_image_model->save();
				}
			}
			
			$home_page_success_story_title = $sent_options['home_page_success_story_title'];
			$home_page_success_story_title_model = Setting::findOne(['name' => 'home_page_success_story_title']);
			if($home_page_success_story_title_model){
				$home_page_success_story_title_model->value = $home_page_success_story_title;
					if(!$home_page_success_story_title_model->default_value){
						$home_page_success_story_title_model->default_value = $home_page_success_story_title_model->value;
					}
				$home_page_success_story_title_model->save();
			}
			$home_page_success_story_subtitle = $sent_options['home_page_success_story_subtitle'];
			$home_page_success_story_subtitle_model = Setting::findOne(['name' => 'home_page_success_story_subtitle']);
			if($home_page_success_story_subtitle_model){
				$home_page_success_story_subtitle_model->value = $home_page_success_story_subtitle;
					if(!$home_page_success_story_subtitle_model->default_value){
						$home_page_success_story_subtitle_model->default_value = $home_page_success_story_subtitle_model->value;
					}
				$home_page_success_story_subtitle_model->save();
			}
			$home_page_success_story_description = $sent_options['home_page_success_story_description'];
			$home_page_success_story_description_model = Setting::findOne(['name' => 'home_page_success_story_description']);
			if($home_page_success_story_description_model){
				$home_page_success_story_description_model->value = $home_page_success_story_description;
					if(!$home_page_success_story_description_model->default_value){
						$home_page_success_story_description_model->default_value = $home_page_success_story_description_model->value;
					}
				$home_page_success_story_description_model->save();
			}
			
			$home_page_join_us_title = $sent_options['home_page_join_us_title'];
			$home_page_join_us_title_model = Setting::findOne(['name' => 'home_page_join_us_title']);
			if($home_page_join_us_title_model){
				$home_page_join_us_title_model->value = $home_page_join_us_title;
					if(!$home_page_join_us_title_model->default_value){
						$home_page_join_us_title_model->default_value = $home_page_join_us_title_model->value;
					}
				$home_page_join_us_title_model->save();
			}
			$home_page_join_us_button_text = $sent_options['home_page_join_us_button_text'];
			$home_page_join_us_button_text_model = Setting::findOne(['name' => 'home_page_join_us_button_text']);
			if($home_page_join_us_button_text_model){
				$home_page_join_us_button_text_model->value = $home_page_join_us_button_text;
					if(!$home_page_join_us_button_text_model->default_value){
						$home_page_join_us_button_text_model->default_value = $home_page_join_us_button_text_model->value;
					}
				$home_page_join_us_button_text_model->save();
			}
			$home_page_join_us_button_link = $sent_options['home_page_join_us_button_link'];
			$home_page_join_us_button_link_model = Setting::findOne(['name' => 'home_page_join_us_button_link']);
			if($home_page_join_us_button_link_model){
				$home_page_join_us_button_link_model->value = $home_page_join_us_button_link;
					if(!$home_page_join_us_button_link_model->default_value){
						$home_page_join_us_button_link_model->default_value = $home_page_join_us_button_link_model->value;
					}
				$home_page_join_us_button_link_model->save();
			}
			
			//SAVING HEADER OPTIONS
			$file = UploadedFile::getInstanceByName('menu_bar_logo');
			if ($file != null && !$file->getHasError()) {
				$type = MediaTypes::THEME_OPTION;
				$mediaDetails = MediaUploader::uploadFiles($file, $type);
				if ($mediaDetails) {
					$menu_bar_logo_model = Setting::findOne(['name' => 'menu_bar_logo']);
					$menu_bar_logo_model->value = strval($mediaDetails['media_id']);
					if(!$menu_bar_logo_model->default_value){
						$menu_bar_logo_model->default_value = $menu_bar_logo_model->value;
					}
					$menu_bar_logo_model->save();
				}
			}
			
			$twitter = $sent_options['twitter'];
			$twitter_model = Setting::findOne(['name' => 'twitter']);
			if($twitter_model){
				$twitter_model->value = $twitter;
					if(!$twitter_model->default_value){
						$twitter_model->default_value = $twitter_model->value;
					}
				$twitter_model->save();
			}
			$gplus = $sent_options['gplus'];
			$gplus_model = Setting::findOne(['name' => 'gplus']);
			if($gplus_model){
				$gplus_model->value = $gplus;
					if(!$gplus_model->default_value){
						$gplus_model->default_value = $gplus_model->value;
					}
				$gplus_model->save();
			}
			$instagram = $sent_options['instagram'];
			$instagram_model = Setting::findOne(['name' => 'instagram']);
			if($instagram_model){
				$instagram_model->value = $instagram;
					if(!$instagram_model->default_value){
						$instagram_model->default_value = $instagram_model->value;
					}
				$instagram_model->save();
			}
			$facebook = $sent_options['facebook'];
			$facebook_model = Setting::findOne(['name' => 'facebook']);
			if($facebook_model){
				$facebook_model->value = $facebook;
					if(!$facebook_model->default_value){
						$facebook_model->default_value = $facebook_model->value;
					}
				$facebook_model->save();
			}
			$pinterest = $sent_options['pinterest'];
			$pinterest_model = Setting::findOne(['name' => 'pinterest']);
			if($pinterest_model){
				$pinterest_model->value = $pinterest;
					if(!$pinterest_model->default_value){
						$pinterest_model->default_value = $pinterest_model->value;
					}
				$pinterest_model->save();
			}
			$header_phone = $sent_options['header_phone'];
			$header_phone_model = Setting::findOne(['name' => 'header_phone']);
			if($header_phone_model){
				$header_phone_model->value = $header_phone;
					if(!$header_phone_model->default_value){
						$header_phone_model->default_value = $header_phone_model->value;
					}
				$header_phone_model->save();
			}
			$header_email = $sent_options['header_email'];
			$header_email_model = Setting::findOne(['name' => 'header_email']);
			if($header_email_model){
				$header_email_model->value = $header_email;
					if(!$header_email_model->default_value){
						$header_email_model->default_value = $header_email_model->value;
					}
				$header_email_model->save();
			}
			
			//SAVING FOOTER OPTIONS			
			$footer_description = $sent_options['footer_description'];
			$footer_description_model = Setting::findOne(['name' => 'footer_description']);
			if($footer_description_model){
				$footer_description_model->value = $footer_description;
					if(!$footer_description_model->default_value){
						$footer_description_model->default_value = $footer_description_model->value;
					}
				$footer_description_model->save();
			}
			$footer_contact_address = $sent_options['footer_contact_address'];
			$footer_contact_address_model = Setting::findOne(['name' => 'footer_contact_address']);
			if($footer_contact_address_model){
				$footer_contact_address_model->value = $footer_contact_address;
					if(!$footer_contact_address_model->default_value){
						$footer_contact_address_model->default_value = $footer_contact_address_model->value;
					}
				$footer_contact_address_model->save();
			}
			$footer_contact_email = $sent_options['footer_contact_email'];
			$footer_contact_email_model = Setting::findOne(['name' => 'footer_contact_email']);
			if($footer_contact_email_model){
				$footer_contact_email_model->value = $footer_contact_email;
					if(!$footer_contact_email_model->default_value){
						$footer_contact_email_model->default_value = $footer_contact_email_model->value;
					}
				$footer_contact_email_model->save();
			}
			$footer_contact_phone = $sent_options['footer_contact_phone'];
			$footer_contact_phone_model = Setting::findOne(['name' => 'footer_contact_phone']);
			if($footer_contact_phone_model){
				$footer_contact_phone_model->value = $footer_contact_phone;
					if(!$footer_contact_phone_model->default_value){
						$footer_contact_phone_model->default_value = $footer_contact_phone_model->value;
					}
				$footer_contact_phone_model->save();
			}
			$footer_developer = $sent_options['footer_developer'];
			$footer_developer_model = Setting::findOne(['name' => 'footer_developer']);
			if($footer_developer_model){
				$footer_developer_model->value = $footer_developer;
					if(!$footer_developer_model->default_value){
						$footer_developer_model->default_value = $footer_developer_model->value;
					}
				$footer_developer_model->save();
			}
			$footer_copyright = $sent_options['footer_copyright'];
			$footer_copyright_model = Setting::findOne(['name' => 'footer_copyright']);
			if($footer_copyright_model){
				$footer_copyright_model->value = $footer_copyright;
					if(!$footer_copyright_model->default_value){
						$footer_copyright_model->default_value = $footer_copyright_model->value;
					}
				$footer_copyright_model->save();
			}
			for($i=1;$i<=6;$i++){
				$footer_quick_link_label = $sent_options['footer_quick_link_'.$i.'_label'];
				$footer_quick_link_label_model = Setting::findOne(['name' => 'footer_quick_link_'.$i.'_label']);
				if($footer_quick_link_label_model){
					$footer_quick_link_label_model->value = $footer_quick_link_label;
					if(!$footer_quick_link_label_model->default_value){
						$footer_quick_link_label_model->default_value = $footer_quick_link_label_model->value;
					}
					$footer_quick_link_label_model->save();
				}
				$footer_quick_link_link = $sent_options['footer_quick_link_'.$i.'_link'];
				$footer_quick_link_link_model = Setting::findOne(['name' => 'footer_quick_link_'.$i.'_link']);
				if($footer_quick_link_link_model){
					$footer_quick_link_link_model->value = $footer_quick_link_link;
					if(!$footer_quick_link_link_model->default_value){
						$footer_quick_link_link_model->default_value = $footer_quick_link_link_model->value;
					}
					$footer_quick_link_link_model->save();
				}
			}
			//CONTACT PAGE OPTIONS
			$contact_map_address = $sent_options['contact_map_address'];
			$contact_map_address_model = Setting::findOne(['name' => 'contact_map_address']);
			if($contact_map_address_model){
				$contact_map_address_model->value = $contact_map_address;
					if(!$contact_map_address_model->default_value){
						$contact_map_address_model->default_value = $contact_map_address_model->value;
					}
				$contact_map_address_model->save();
			}
			
			$fees_page_content = $sent_options['fees_page_content'];
			$fees_page_content_model = Setting::findOne(['name' => 'fees_page_content']);
			if($fees_page_content_model){
				$fees_page_content_model->value = $fees_page_content;
					if(!$fees_page_content_model->default_value){
						$fees_page_content_model->default_value = $fees_page_content_model->value;
					}
				$fees_page_content_model->save();
			}
			
			return $this->redirect(['theme-options']);
		}

        return $this->render('theme_options', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'headerOptions' => $headerOptions,
            'footerOptions' => $footerOptions,
            'homePageOptions' => $homePageOptions,
            'contactPageOptions' => $contactPageOptions,
            'feesPageOptions' => $feesPageOptions,
        ]);
    }

    /**
     * Finds the Setting model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Setting the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

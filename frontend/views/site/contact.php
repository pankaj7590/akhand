<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use common\models\Setting;

$this->title = 'Contact';

$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;


?>
<!--CONTACT WRAP BEGIN-->
<section class="contacts-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
				<?= $this->render('../layouts/_sidebar');?>
            </div>
            <div class="col-md-7">
                <h4>Get in touch</h4>	
                <div class="leave-comment-wrap">
					<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
                                   <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-6">
                                <div class="item">
									<?= $form->field($model, 'email')->textInput(['class' => '']) ?>
                                </div>	
                            </div>
                            <div class="col-md-6">
                                <div class="item">
									<?= $form->field($model, 'phone')->textInput(['class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
                                    <?= $form->field($model, 'subject')->textInput(['class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
                                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'class' => '']) ?>
                                </div>
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
                                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
										'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
										'options' => ['class' => ''],
									]) ?>
                                </div>
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
								<?= Html::submitButton('Send us message', ['class' => 'comment-submit', 'name' => 'contact-button']) ?>
                            </div>
                        </div>
					<?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="contacts-map">
        <img class="img-responsive" src="<?= $baseUrl;?>/images/soccer/contacts-map.jpg" alt="contacts-map">
    </div>
</section>
<!--CONTACT WRAP END-->
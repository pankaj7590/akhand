<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\Setting;
use common\components\Relations;


/* @var $this yii\web\View */
/* @var $model common\models\Admission */

$this->title = 'Profile';
?>
<!--CONTACT WRAP BEGIN-->
<section class="contacts-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
				<?= $this->render('../layouts/_sidebar');?>
            </div>
            <div class="col-md-7">
                <h4>Profile</h4>	
                <div class="leave-comment-wrap">
					<?php $form = ActiveForm::begin(['id' => 'form']); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
									<img src="<?= \common\components\MediaHelper::getImageUrl(($model->profilePicture?$model->profilePicture->file_name:""))?>" alt="" class="img-border img-indent" style="width:100px;">
									<?= $form->field($model, 'profilePictureFile')->fileInput() ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
									<?= $form->field($model, 'name')->textInput(['maxlength' => true, 'class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
									<input name="Guardian[username]" style="display:none">
								<?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
									<input name="Guardian[password]" type="password" style="display:none">
									<?= $form->field($model, 'password')->passwordInput(['class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
									<?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item">
									<?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'class' => '']) ?>
                                </div>	
                            </div>
						</div>	
                        <div class="row">
                            <div class="col-md-12">
								<?= Html::resetButton('Reset', ['class' => 'comment-submit', 'name' => 'contact-button']) ?>
								<?= Html::submitButton('Save', ['class' => 'comment-submit', 'name' => 'contact-button']) ?>
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
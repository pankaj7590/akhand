<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\SportTypes;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="contacts-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
				<?= $this->render('../layouts/_sidebar');?>
            </div>
            <div class="col-md-7">
                <h4><?= Html::encode($this->title) ?></h4>	
                <div class="leave-comment-wrap">
					<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
						<div class="row">
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'organization')->dropdownList($organizations, ['prompt' => 'Select organization to request']); ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'interested_sports')->dropdownList(SportTypes::$types, ['class' => '', 'multiple' => true, 'style' => 'height:95px;']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'username')->textInput(['class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'phone')->textInput(['class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'email')->textInput(['class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'password')->passwordInput(['class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'coach_required')->checkbox(['class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::classname(), ['options' => ['class' => '']]) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<div class="form-group">
										<?= Html::submitButton('Signup', ['class' => 'comment-submit', 'name' => 'signup-button']) ?>
									</div>
								</div>	
							</div>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
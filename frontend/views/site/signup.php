<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="contacts-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h4>Head office</h4>	
                <p>Selvage mixtape coloring book, street art swag sriracha activated charcoal vegan hammock selfies distillery wayfarers dreamcatcher lyft beard. </p>
                <div class="contact-office-img">
                    <img class="img-responsive" src="<?= $baseUrl;?>/images/soccer/contact-office-img.jpg" alt="contact-office-img">	
                </div>
                <ul class="contact-list">
                    <li><i class="fa fa-flag" aria-hidden="true"></i><span>276 Upper Parliament Street, Liverpool L8, Great Britain</span></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:team@email.com">team@email.com</a></li>
                    <li class="phone"><i class="fa fa-phone" aria-hidden="true"></i><span>+61 3 8376 6284</span></li>
                </ul>
                <ul class="contact-bar">
                    <li class="facebook"><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="google"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>
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
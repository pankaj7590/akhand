<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
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
					<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
						<div class="row">
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => '']) ?>
								</div>
							</div>
							<div class="col-md-12">
								<div class="item">
									<div style="color:#999;margin:1em 0">
										Back to <?= Html::a('Login', ['site/login']) ?>.
									</div>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<?= Html::submitButton('Send', ['class' => 'comment-submit']) ?>
								</div>
							</div>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
        </div>
    </div>
</section>
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
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
					<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
						<div class="row">
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'password')->passwordInput(['class' => '']) ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<?= $form->field($model, 'rememberMe')->checkbox() ?>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="item">
									<div style="color:#999;margin:1em 0">
										If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?> else you can <?= Html::a('register', ['site/signup']) ?>.
									</div>
								</div>	
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<?= Html::submitButton('Login', ['class' => 'comment-submit', 'name' => 'login-button']) ?>
								</div>
							</div>
						</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>
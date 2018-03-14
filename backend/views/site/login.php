<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
	<h1>Member Login</h1>
	<div class="login-fields">
		<p>Please provide your details</p>
		<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Username', 'class' => 'login username-field']) ?>
		<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password', 'class' => 'login password-field']) ?>
	</div> <!-- /login-fields -->
	<div class="login-actions">
		<span class="login-checkbox">
			<?= $form->field($model, 'rememberMe')->checkbox(['placeholder' => 'Password', 'class' => 'field login-checkbox'])->label('Keep me signed in') ?>
		</span>			
		<?= Html::submitButton('Sign In', ['class' => 'button btn btn-success btn-large', 'name' => 'login-button']) ?>
	</div> <!-- .actions -->
	<div class="login-extra">
			<a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/request-reset-password-token'])?>">Reset Password</a>
	</div> <!-- /login-extra -->
<?php ActiveForm::end(); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

if($model->isNewRecord){
	$this->title = 'Add New';
	$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
}else{
	$this->title = 'Update User: '.$model->fullname;
	$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->fullname, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Update';
}
?>
<div class="span12">
	<div class="widget ">
		<div class="widget-header">
			<i class="icon-user"></i>
	      	<h3><?= $this->title;?></h3>
	  	</div> <!-- /widget-header -->
		<div class="widget-content">
			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
				<fieldset>
					<?php if($model->profilePicture){?>
						<div class="controls">
							<img src="<?= \common\components\MediaHelper::getImageUrl($model->profilePicture->file_name)?>"/>
						</div>
					<?php }?>
					<?= $form->field($model, 'profilePictureFile', ['template' => '{label}<div class="controls">{input}</div>{error}'])->fileInput() ?>
					<?= $form->field($model, 'name', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'username', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'password', ['template' => '{label}<div class="controls">{input}</div>{error}'])->passwordInput() ?>
					<?= $form->field($model, 'email', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'phone', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div> <!-- /form-actions -->
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
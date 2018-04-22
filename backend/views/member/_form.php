<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\SportTypes;

/* @var $this yii\web\View */
/* @var $model common\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-plus-sign"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
				<fieldset>
					<?php if($model->profilePicture){?>
						<div class="controls">
							<img src="<?= \common\components\MediaHelper::getImageUrl($model->profilePicture->file_name)?>" style="width:200px;"/>
						</div>
					<?php }?>
					<?= $form->field($model, 'profilePictureFile', ['template' => '{label}<div class="controls">{input}</div>{error}'])->fileInput() ?>
					<?= $form->field($model, 'interested_sports', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList(SportTypes::$types, ['class' => '', 'multiple' => true, 'style' => 'height:95px;']) ?>
					<?= $form->field($model, 'name', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'username', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'password', ['template' => '{label}<div class="controls">{input}</div>{error}'])->passwordInput() ?>
					<?= $form->field($model, 'email', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'phone', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'coach_required', ['template' => '{label}<div class="controls">{input}</div>{error}'])->checkbox() ?>
					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
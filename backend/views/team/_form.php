<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\SportTypes;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-group"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
				<fieldset>
					<?php if($model->logoPicture){?>
						<div class="controls">
							<img src="<?= \common\components\MediaHelper::getImageUrl($model->logoPicture->file_name)?>"/>
						</div>
					<?php }?>
					<?= $form->field($model, 'logoFile', ['template' => '{label}<div class="controls">{input}</div>{error}'])->fileInput() ?>
					<?= $form->field($model, 'type', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList(SportTypes::$types) ?>
					<?= $form->field($model, 'name', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
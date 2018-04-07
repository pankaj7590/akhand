<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Setting;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-calendar"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
				<fieldset>
					<?= $form->field($model, 'setting_group', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList(Setting::$groups, ['prompt' => 'Select a group...']) ?>
					<?= $form->field($model, 'name', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'label', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'default_value', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'value', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<div class="form-group">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
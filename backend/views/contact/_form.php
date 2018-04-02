<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Contact */
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
					<?= $form->field($model, 'name', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'surname', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'email', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'phone', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'message', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textarea(['rows' => 6]) ?>
					<div class="form-group">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>

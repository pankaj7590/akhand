<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentMatch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-flag-checkered"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
				<fieldset>
					<?= $form->field($model, 'match_id', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>

					<?= $form->field($model, 'status', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
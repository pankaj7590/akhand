<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */
/* @var $form yii\widgets\ActiveForm */
$urlManager = Yii::$app->urlManager;
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
					<?= $form->field($model, 'team_id', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'entry_fee', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['value' => $model->tournament->entry_fee]) ?>
					<?= $form->field($model, 'is_paid', ['template' => '{label}<div class="controls">{input}</div>{error}'])->checkbox() ?>
					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
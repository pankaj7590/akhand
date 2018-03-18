<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\SportTypes;
use common\components\MatchStatuses;
use common\models\Match;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model common\models\Match */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-flag"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
				<fieldset>
					<?= $form->field($model, 'first_team_id', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList($typeTeams) ?>
					<?= $form->field($model, 'second_team_id', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList($typeTeams) ?>
					<?php if(!$model->isNewRecord){?>
						<?= $form->field($model, 'winner_team_id', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList($matchTeams) ?>
						<?= $form->field($model, 'first_team_score', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
						<?= $form->field($model, 'first_team_wickets', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
						<?= $form->field($model, 'second_team_score', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
						<?= $form->field($model, 'second_team_wickets', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?php }?>
					<?= $form->field($model, 'status', ['template' => '{label}<div class="controls">{input}</div>{error}'])->radioList(MatchStatuses::$statuses) ?>
					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
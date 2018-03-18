<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Tournament;
use common\components\SportTypes;

/* @var $this yii\web\View */
/* @var $model common\models\Tournament */
/* @var $form yii\widgets\ActiveForm */
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-flag-checkered"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
			<?php if(!$model->isNewRecord){?>
				<div class="pull-right header-btns">
					<a href="<?= $urlManager->createAbsoluteUrl(['tournament-team/index', 'id' => $model->id]);?>" class="btn btn-info">Teams</a>
					<a href="<?= $urlManager->createAbsoluteUrl(['tournament-match/index', 'id' => $model->id]);?>" class="btn btn-warning">Matches</a>
				</div>
			<?php }?>
	  	</div>
		<div class="widget-content">
			<?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>
				<fieldset>
					<?php if($model->bannerPicture){?>
						<div class="controls">
							<img src="<?= \common\components\MediaHelper::getImageUrl($model->bannerPicture->file_name)?>"/>
						</div>
					<?php }?>
					<?= $form->field($model, 'bannerFile', ['template' => '{label}<div class="controls">{input}</div>{error}'])->fileInput() ?>
					<?php if($model->logoPicture){?>
						<div class="controls">
							<img src="<?= \common\components\MediaHelper::getImageUrl($model->logoPicture->file_name)?>"/>
						</div>
					<?php }?>
					<?= $form->field($model, 'logoFile', ['template' => '{label}<div class="controls">{input}</div>{error}'])->fileInput() ?>
					<?= $form->field($model, 'type', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList(SportTypes::$types) ?>
					<?= $form->field($model, 'level', ['template' => '{label}<div class="controls">{input}</div>{error}'])->dropdownList(Tournament::$levels) ?>
					<?= $form->field($model, 'name', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'from_date', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'to_date', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'entry_fee', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'info', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textarea(['rows' => 6]) ?>
					<?= $form->field($model, 'has_monetary_reward', ['template' => '{label}<div class="controls">{input}</div>{error}'])->radio() ?>
					<?= $form->field($model, 'monetary_reward', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput() ?>
					<?= $form->field($model, 'status', ['template' => '{label}<div class="controls">{input}</div>{error}'])->radioList(Tournament::$statuses) ?>
					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
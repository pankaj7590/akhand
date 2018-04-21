<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\NewsEvent */
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
					<?php if($model->newsEventPhoto){?>
						<div class="controls">
							<img src="<?= \common\components\MediaHelper::getImageUrl($model->newsEventPhoto->file_name)?>" width="200px"/>
						</div>
					<?php }?>
					<?= $form->field($model, 'photoFile', ['template' => '{label}<div class="controls">{input}</div>{error}'])->fileInput() ?>
					<?= $form->field($model, 'title', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<?= $form->field($model, 'content', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textarea(['rows' => 6]) ?>
					<?= $form->field($model, 'news_event_date', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput()->widget(DateTimePicker::classname(), [
						'options' => ['placeholder' => 'Enter date ...'],
						'pluginOptions' => [
							'autoclose' => true,
							'minView' => 4,
							'format' => Yii::$app->params['jsDateFormat'],
						]
					]); ?>
					<?= $form->field($model, 'place', ['template' => '{label}<div class="controls">{input}</div>{error}'])->textInput(['maxlength' => true]) ?>
					<div class="form-group">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
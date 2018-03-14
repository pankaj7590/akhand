<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\Organization;

/* @var $this yii\web\View */
/* @var $model common\models\Organization */
/* @var $form yii\widgets\ActiveForm */

$types = [];
foreach($model->organizationTypes as $ot){
	$types[] = $ot->type;
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
					<?php if($model->organizationLogo){?>
						<div class="controls">
							<img src="<?= \common\components\MediaHelper::getImageUrl($model->organizationLogo->file_name)?>"/>
						</div>
					<?php }?>
					<?= $form->field($model, 'logoFile', ['template' => '{label}<div class="controls">{input}{error}</div>'])->fileInput() ?>

					<?= $form->field($model, 'temp_types', ['template' => '{label}<div class="controls">{input}{error}</div>'])->dropdownList(Organization::$types, ['multiple' => true, 'value' => $types]) ?>
					
					<?= $form->field($model, 'name', ['template' => '{label}<div class="controls">{input}{error}</div>'])->textInput(['maxlength' => true]) ?>

					<?= $form->field($model, 'info', ['template' => '{label}<div class="controls">{input}{error}</div>'])->textarea(['rows' => 6]) ?>

					<div class="form-actions">
						<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
					</div>
				</fieldset>
			<?php ActiveForm::end(); ?>
		</div> <!-- /widget-content -->
	</div> <!-- /widget -->
</div>
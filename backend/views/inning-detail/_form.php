<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InningDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inning-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'match_id')->textInput() ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <?= $form->field($model, 'batsman_id')->textInput() ?>

    <?= $form->field($model, 'bowler_id')->textInput() ?>

    <?= $form->field($model, 'runs_scored')->textInput() ?>

    <?= $form->field($model, 'extra_runs')->textInput() ?>

    <?= $form->field($model, 'is_wicket')->textInput() ?>

    <?= $form->field($model, 'is_wide_ball')->textInput() ?>

    <?= $form->field($model, 'is_no_ball')->textInput() ?>

    <?= $form->field($model, 'is_leg_bye')->textInput() ?>

    <?= $form->field($model, 'is_six')->textInput() ?>

    <?= $form->field($model, 'is_four')->textInput() ?>

    <?= $form->field($model, 'are_four_runs')->textInput() ?>

    <?= $form->field($model, 'are_triples')->textInput() ?>

    <?= $form->field($model, 'are_doubles')->textInput() ?>

    <?= $form->field($model, 'are_singles')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

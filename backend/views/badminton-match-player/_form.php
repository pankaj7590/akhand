<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BadmintonMatchPlayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="badminton-match-player-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'match_id')->textInput() ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <?= $form->field($model, 'player_id')->textInput() ?>

    <?= $form->field($model, 'services')->textInput() ?>

    <?= $form->field($model, 'points_taken')->textInput() ?>

    <?= $form->field($model, 'unforced_errors')->textInput() ?>

    <?= $form->field($model, 'points_given')->textInput() ?>

    <?= $form->field($model, 'out_services')->textInput() ?>

    <?= $form->field($model, 'net_services')->textInput() ?>

    <?= $form->field($model, 'faults')->textInput() ?>

    <?= $form->field($model, 'double_faults')->textInput() ?>

    <?= $form->field($model, 'rallies')->textInput() ?>

    <?= $form->field($model, 'smashes')->textInput() ?>

    <?= $form->field($model, 'net_drops')->textInput() ?>

    <?= $form->field($model, 'returns')->textInput() ?>

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

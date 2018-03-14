<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tournament-team-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tournament_id')->textInput() ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <?= $form->field($model, 'entry_fee')->textInput() ?>

    <?= $form->field($model, 'is_paid')->textInput() ?>

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

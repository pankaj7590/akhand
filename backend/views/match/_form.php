<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Match */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tournament_id')->textInput() ?>

    <?= $form->field($model, 'first_team_id')->textInput() ?>

    <?= $form->field($model, 'second_team_id')->textInput() ?>

    <?= $form->field($model, 'winner_team_id')->textInput() ?>

    <?= $form->field($model, 'first_team_score')->textInput() ?>

    <?= $form->field($model, 'first_team_wickets')->textInput() ?>

    <?= $form->field($model, 'second_team_score')->textInput() ?>

    <?= $form->field($model, 'second_team_wickets')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

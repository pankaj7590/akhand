<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MatchPlayer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-player-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'match_id')->textInput() ?>

    <?= $form->field($model, 'team_id')->textInput() ?>

    <?= $form->field($model, 'player_id')->textInput() ?>

    <?= $form->field($model, 'balls_played')->textInput() ?>

    <?= $form->field($model, 'runs_scored')->textInput() ?>

    <?= $form->field($model, 'extra_runs')->textInput() ?>

    <?= $form->field($model, 'wickets_taken')->textInput() ?>

    <?= $form->field($model, 'wide_balls')->textInput() ?>

    <?= $form->field($model, 'no_balls')->textInput() ?>

    <?= $form->field($model, 'leg_byes')->textInput() ?>

    <?= $form->field($model, 'sixes')->textInput() ?>

    <?= $form->field($model, 'fours')->textInput() ?>

    <?= $form->field($model, 'four_runs')->textInput() ?>

    <?= $form->field($model, 'triples')->textInput() ?>

    <?= $form->field($model, 'doubles')->textInput() ?>

    <?= $form->field($model, 'singles')->textInput() ?>

    <?= $form->field($model, 'batting_duration')->textInput() ?>

    <?= $form->field($model, 'bowling_duration')->textInput() ?>

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

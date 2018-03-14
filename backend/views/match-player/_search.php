<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\MatchPlayerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-player-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'match_id') ?>

    <?= $form->field($model, 'team_id') ?>

    <?= $form->field($model, 'player_id') ?>

    <?= $form->field($model, 'balls_played') ?>

    <?php // echo $form->field($model, 'runs_scored') ?>

    <?php // echo $form->field($model, 'extra_runs') ?>

    <?php // echo $form->field($model, 'wickets_taken') ?>

    <?php // echo $form->field($model, 'wide_balls') ?>

    <?php // echo $form->field($model, 'no_balls') ?>

    <?php // echo $form->field($model, 'leg_byes') ?>

    <?php // echo $form->field($model, 'sixes') ?>

    <?php // echo $form->field($model, 'fours') ?>

    <?php // echo $form->field($model, 'four_runs') ?>

    <?php // echo $form->field($model, 'triples') ?>

    <?php // echo $form->field($model, 'doubles') ?>

    <?php // echo $form->field($model, 'singles') ?>

    <?php // echo $form->field($model, 'batting_duration') ?>

    <?php // echo $form->field($model, 'bowling_duration') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

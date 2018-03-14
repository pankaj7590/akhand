<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\InningDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inning-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'match_id') ?>

    <?= $form->field($model, 'team_id') ?>

    <?= $form->field($model, 'batsman_id') ?>

    <?= $form->field($model, 'bowler_id') ?>

    <?php // echo $form->field($model, 'runs_scored') ?>

    <?php // echo $form->field($model, 'extra_runs') ?>

    <?php // echo $form->field($model, 'is_wicket') ?>

    <?php // echo $form->field($model, 'is_wide_ball') ?>

    <?php // echo $form->field($model, 'is_no_ball') ?>

    <?php // echo $form->field($model, 'is_leg_bye') ?>

    <?php // echo $form->field($model, 'is_six') ?>

    <?php // echo $form->field($model, 'is_four') ?>

    <?php // echo $form->field($model, 'are_four_runs') ?>

    <?php // echo $form->field($model, 'are_triples') ?>

    <?php // echo $form->field($model, 'are_doubles') ?>

    <?php // echo $form->field($model, 'are_singles') ?>

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

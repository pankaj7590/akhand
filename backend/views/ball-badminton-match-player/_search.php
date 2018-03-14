<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\BallBadmintonMatchPlayerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ball-badminton-match-player-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'match_id') ?>

    <?= $form->field($model, 'team_id') ?>

    <?= $form->field($model, 'player_id') ?>

    <?= $form->field($model, 'services') ?>

    <?php // echo $form->field($model, 'points_taken') ?>

    <?php // echo $form->field($model, 'unforced_errors') ?>

    <?php // echo $form->field($model, 'points_given') ?>

    <?php // echo $form->field($model, 'out_services') ?>

    <?php // echo $form->field($model, 'net_services') ?>

    <?php // echo $form->field($model, 'rallies') ?>

    <?php // echo $form->field($model, 'smashes') ?>

    <?php // echo $form->field($model, 'loops') ?>

    <?php // echo $form->field($model, 'net_drops') ?>

    <?php // echo $form->field($model, 'returns') ?>

    <?php // echo $form->field($model, 'blocks') ?>

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

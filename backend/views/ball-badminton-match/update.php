<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BallBadmintonMatch */

$this->title = 'Update Ball Badminton Match: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ball Badminton Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ball-badminton-match-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

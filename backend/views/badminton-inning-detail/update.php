<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BadmintonInningDetail */

$this->title = 'Update Badminton Inning Detail: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Badminton Inning Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="badminton-inning-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

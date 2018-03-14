<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BadmintonMatch */

$this->title = 'Update Badminton Match: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Badminton Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="badminton-match-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

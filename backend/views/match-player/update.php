<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MatchPlayer */

$this->title = 'Update Match Player: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Match Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="match-player-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

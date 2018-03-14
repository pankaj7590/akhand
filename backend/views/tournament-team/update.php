<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */

$this->title = 'Update Tournament Team: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tournament Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tournament-team-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

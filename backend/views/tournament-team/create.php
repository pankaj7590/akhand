<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */

$this->title = 'Create Tournament Team';
$this->params['breadcrumbs'][] = ['label' => 'Tournament Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-team-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */

$this->title = 'Update Tournament Team: '.$model->team->name;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['tournament/index']];
$this->params['breadcrumbs'][] = ['label' => $model->tournament->name, 'url' => ['tournament/update', 'id' => $model->tournament_id]];
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index', 'id' => $model->tournament_id]];
$this->params['breadcrumbs'][] = ['label' => $model->team->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
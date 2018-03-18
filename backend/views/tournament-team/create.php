<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TournamentTeam */

$this->title = 'Add Team';
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['tournament/index']];
$this->params['breadcrumbs'][] = ['label' => $model->tournament->name, 'url' => ['tournament/update', 'id' => $model->tournament_id]];
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index', 'id' => $model->tournament_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
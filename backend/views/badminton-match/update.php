<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BadmintonMatch */

$this->title = 'Update Match: '.($model->firstTeam->name.' - '.$model->secondTeam->name);
$this->params['breadcrumbs'][] = ['label' => 'Badminton Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => ($model->firstTeam->name.' - '.$model->secondTeam->name), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
        'model' => $model,
            'matchTeams' => $matchTeams,
            'typeTeams' => $typeTeams,
    ]) ?>
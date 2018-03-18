<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TournamentMatch */

$this->title = 'Update Tournament Match: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tournament Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
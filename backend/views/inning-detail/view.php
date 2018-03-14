<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\InningDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inning Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inning-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'match_id',
            'team_id',
            'batsman_id',
            'bowler_id',
            'runs_scored',
            'extra_runs',
            'is_wicket',
            'is_wide_ball',
            'is_no_ball',
            'is_leg_bye',
            'is_six',
            'is_four',
            'are_four_runs',
            'are_triples',
            'are_doubles',
            'are_singles',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

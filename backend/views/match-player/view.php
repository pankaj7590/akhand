<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MatchPlayer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Match Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-player-view">

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
            'player_id',
            'balls_played',
            'runs_scored',
            'extra_runs',
            'wickets_taken',
            'wide_balls',
            'no_balls',
            'leg_byes',
            'sixes',
            'fours',
            'four_runs',
            'triples',
            'doubles',
            'singles',
            'batting_duration',
            'bowling_duration',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

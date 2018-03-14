<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MatchPlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Match Players';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-player-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Match Player', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'match_id',
            'team_id',
            'player_id',
            'balls_played',
            //'runs_scored',
            //'extra_runs',
            //'wickets_taken',
            //'wide_balls',
            //'no_balls',
            //'leg_byes',
            //'sixes',
            //'fours',
            //'four_runs',
            //'triples',
            //'doubles',
            //'singles',
            //'batting_duration',
            //'bowling_duration',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

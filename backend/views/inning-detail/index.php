<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\InningDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inning Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inning-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inning Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'match_id',
            'team_id',
            'batsman_id',
            'bowler_id',
            //'runs_scored',
            //'extra_runs',
            //'is_wicket',
            //'is_wide_ball',
            //'is_no_ball',
            //'is_leg_bye',
            //'is_six',
            //'is_four',
            //'are_four_runs',
            //'are_triples',
            //'are_doubles',
            //'are_singles',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

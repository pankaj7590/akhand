<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BallBadmintonInningDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ball Badminton Inning Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ball-badminton-inning-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ball Badminton Inning Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'match_id',
            'set',
            'team_id',
            'server_id',
            //'receiver_id',
            //'over_type',
            //'over_by',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

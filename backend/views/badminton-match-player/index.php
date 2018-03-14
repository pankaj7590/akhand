<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BadmintonMatchPlayerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Badminton Match Players';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="badminton-match-player-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Badminton Match Player', ['create'], ['class' => 'btn btn-success']) ?>
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
            'services',
            //'points_taken',
            //'unforced_errors',
            //'points_given',
            //'out_services',
            //'net_services',
            //'faults',
            //'double_faults',
            //'rallies',
            //'smashes',
            //'net_drops',
            //'returns',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TournamentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tournaments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournament-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tournament', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type',
            'name',
            'banner',
            'logo',
            //'from_date',
            //'to_date',
            //'entry_fee',
            //'info:ntext',
            //'has_monetary_reward',
            //'monetary_reward',
            //'status',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',
            //'level',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

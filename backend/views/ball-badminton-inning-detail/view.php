<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BallBadmintonInningDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ball Badminton Inning Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ball-badminton-inning-detail-view">

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
            'set',
            'team_id',
            'server_id',
            'receiver_id',
            'over_type',
            'over_by',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

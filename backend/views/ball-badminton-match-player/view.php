<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BallBadmintonMatchPlayer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ball Badminton Match Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ball-badminton-match-player-view">

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
            'services',
            'points_taken',
            'unforced_errors',
            'points_given',
            'out_services',
            'net_services',
            'rallies',
            'smashes',
            'loops',
            'net_drops',
            'returns',
            'blocks',
            'status',
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

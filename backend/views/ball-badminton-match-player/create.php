<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BallBadmintonMatchPlayer */

$this->title = 'Create Ball Badminton Match Player';
$this->params['breadcrumbs'][] = ['label' => 'Ball Badminton Match Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ball-badminton-match-player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

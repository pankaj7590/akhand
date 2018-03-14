<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BallBadmintonInningDetail */

$this->title = 'Create Ball Badminton Inning Detail';
$this->params['breadcrumbs'][] = ['label' => 'Ball Badminton Inning Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ball-badminton-inning-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BallBadmintonMatch */

$this->title = 'Create Ball Badminton Match';
$this->params['breadcrumbs'][] = ['label' => 'Ball Badminton Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ball-badminton-match-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

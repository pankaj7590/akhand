<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BadmintonInningDetail */

$this->title = 'Create Badminton Inning Detail';
$this->params['breadcrumbs'][] = ['label' => 'Badminton Inning Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="badminton-inning-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

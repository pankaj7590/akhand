<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\InningDetail */

$this->title = 'Create Inning Detail';
$this->params['breadcrumbs'][] = ['label' => 'Inning Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inning-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

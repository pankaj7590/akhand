<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BadmintonMatch */

$this->title = 'Create Badminton Match';
$this->params['breadcrumbs'][] = ['label' => 'Badminton Matches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="badminton-match-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BadmintonMatchPlayer */

$this->title = 'Create Badminton Match Player';
$this->params['breadcrumbs'][] = ['label' => 'Badminton Match Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="badminton-match-player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

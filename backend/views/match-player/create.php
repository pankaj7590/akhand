<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MatchPlayer */

$this->title = 'Create Match Player';
$this->params['breadcrumbs'][] = ['label' => 'Match Players', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="match-player-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

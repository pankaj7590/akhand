<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PlayerType */

$this->title = 'Create Player Type';
$this->params['breadcrumbs'][] = ['label' => 'Player Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="player-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

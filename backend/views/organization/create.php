<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Organization */

$this->title = 'Add New';
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
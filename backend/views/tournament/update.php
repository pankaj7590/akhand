<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Tournament */

$this->title = 'Update Tournament: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
        'model' => $model,
    ]) ?>
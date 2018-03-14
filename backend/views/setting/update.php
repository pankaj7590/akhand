<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Setting */

$this->title = 'Update Setting: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
	'model' => $model,
]) ?>
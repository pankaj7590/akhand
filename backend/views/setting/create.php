<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Setting */

$this->title = 'Add Setting';
$this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
	'model' => $model,
]) ?>
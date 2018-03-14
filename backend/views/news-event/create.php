<?php

use yii\helpers\Html;
use common\models\NewsEvent;

/* @var $this yii\web\View */
/* @var $model common\models\NewsEvent */

$this->title = 'Add '.NewsEvent::$types[$model->type];
$this->params['breadcrumbs'][] = ['label' => NewsEvent::$types[$model->type], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_form', [
	'model' => $model,
]) ?>
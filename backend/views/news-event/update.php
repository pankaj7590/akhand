<?php

use yii\helpers\Html;
use common\models\NewsEvent;

/* @var $this yii\web\View */
/* @var $model common\models\NewsEvent */

$this->title = 'Update '.NewsEvent::$types[$model->type].': '.$model->title;
$this->params['breadcrumbs'][] = ['label' => 'News '.NewsEvent::$types[$model->type], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?= $this->render('_form', [
	'model' => $model,
]) ?>
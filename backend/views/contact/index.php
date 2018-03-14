<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-calendar"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
					return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['contact/update', 'id' => $model->id]).'"'];
				},
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					'name',
					'surname',
					'email:email',
					// 'feedback_type',
					'message:ntext',
				],
			]); ?>
			</div>
		</div>
	</div>
</div>
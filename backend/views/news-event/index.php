<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\NewsEvent;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NewsEventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = NewsEvent::$types[$type];
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
			<div class="news-event-index">
				<p>
					<?= Html::a('Add New', ['create', 'type' => $type], ['class' => 'btn btn-success']) ?>
				</p>
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
						return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['news-event/update', 'id' => $model->id]).'"'];
					},
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],

						[
							'attribute' => 'photo',
							'filter' => false,
							'value' => function($data){
								$fileName = ($data->newsEventPhoto?$data->newsEventPhoto->file_name:"");
								return \common\components\MediaHelper::getImageUrl($fileName);
							},
							'format' => ['image', ['width' => '100']],
						],
						'title',
						'content:ntext',
						'news_event_date',
						'place:ntext',
					],
				]); ?>
			</div>
		</div>
	</div>
</div>
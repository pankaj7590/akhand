<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-folder-open"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="gallery-index">
				<p>
					<?= Html::a('Add New', ['create'], ['class' => 'btn btn-success']) ?>
				</p>

				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
						return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['gallery/update', 'id' => $model->id]).'"'];
					},
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],

						'name',
						'description:ntext',
						'type',

						['class' => 'yii\grid\ActionColumn'],
					],
				]); ?>
			</div>
		</div>
	</div>
</div>
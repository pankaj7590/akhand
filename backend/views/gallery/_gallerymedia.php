<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GalleryMediaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-folder-open"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					[
						'attribute' => 'media_id',
						'filter' => false,
						'value' => function($data){
							$fileName = ($data->media?$data->media->file_name:"");
							return \common\components\MediaHelper::getImageUrl($fileName);
						},
						'format' => ['image', ['width' => '100']],
					],
					[
						'attribute' => 'updated_by',
						'value' => function($data){
							return ($data->updatedBy?$data->updatedBy->name:NULL);
						},
					],
					'updated_at:datetime',

					[
						'class' => 'yii\grid\ActionColumn',
						'template' => '{view} {delete}',
						'buttons' => [
							'view' => function($key, $model, $url){
								return Html::a('<i class="icon-eye-open"></i>', ['media/view', 'id' => $model->media_id]);
							},
							'delete' => function($key, $model, $url){
								return Html::a('<i class="icon-folder-open"></i>', ['media/delete', 'id' => $model->media_id], ['data' => ['method' => 'post', 'confirm' => 'Are you sure you want to delete this picture from gallery?']]);
							},
						],
					],
				],
			]); ?>
		</div>
	</div>
</div>
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
	      	<h3>Team Members</h3>
	  	</div>
		<div class="widget-content">
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					[
						'attribute' => 'profilePicture',
						'filter' => false,
						'value' => function($data){
							$fileName = ($data->member->profilePicture?$data->member->profilePicture->file_name:"");
							return \common\components\MediaHelper::getImageUrl($fileName);
						},
						'format' => ['image', ['width' => '100']],
					],
					'member.name',

					[
						'class' => 'yii\grid\ActionColumn',
						'template' => '{view} {delete}',
						'buttons' => [
							'view' => function($key, $model, $url){
								return Html::a('<i class="icon-pencil"></i>', ['member/update', 'id' => $model->id]);
							},
							'delete' => function($key, $model, $url){
								return Html::a('<i class="icon-trash"></i>', ['team-member/delete', 'id' => $model->id], ['data' => ['method' => 'post', 'confirm' => 'Are you sure you want to delete this member from team?']]);
							},
						],
					],
				],
			]); ?>
		</div>
	</div>
</div>
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-user"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="user-index">
				<p>
					<?= Html::a('Add New', ['create'], ['class' => 'btn btn-success']) ?>
				</p>
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
						return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['user/update', 'id' => $model->id]).'"'];
					},
					'options' => ['class' => 'grid-view table-responsive'],
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],

						[
							'attribute' => 'profile_picture',
							'filter' => false,
							'value' => function($data){
								$fileName = ($data->profilePicture?$data->profilePicture->file_name:"");
								return \common\components\MediaHelper::getImageUrl($fileName);
							},
							'format' => ['image', ['height' => '100']],
						],
						'name',
						'username',
						'email:email',
						'phone',
					],
				]); ?>
			</div>
		</div>
	</div>
</div>
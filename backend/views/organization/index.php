<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Organizations';
$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-certificate"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<p>
				<?= Html::a('Add New', ['create'], ['class' => 'btn btn-success']) ?>
			</p>
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
					return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['organization/update', 'id' => $model->id]).'"'];
				},
				'options' => ['class' => 'grid-view table-responsive'],
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					'name',
					'info:ntext',
					[
						'attribute' => 'logo',
						'filter' => false,
						'value' => function($data){
							$fileName = ($data->organizationLogo?$data->organizationLogo->file_name:"");
							return \common\components\MediaHelper::getImageUrl($fileName);
						},
						'format' => ['image', ['height' => '100']],
					],
				],
			]); ?>
		</div>
	</div>
</div>
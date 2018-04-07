<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Setting;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-gears"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="setting-index">
				<p>
					<?= Html::a('Add New', ['create'], ['class' => 'btn btn-success']) ?>
				</p>
				<div class="table-responsive">
					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
							return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['setting/update', 'id' => $model->id]).'"'];
						},
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							[
								'attribute' => 'setting_group',
								'filter' => Setting::$groups,
								'value' => function($data){
									return ($data->setting_group?Setting::$groups[$data->setting_group]:NULL);
								},
							],
							'name',
							'label',
							'value:ntext',
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
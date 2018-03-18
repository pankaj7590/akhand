<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\SportTypes;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-group"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="member-index">
				<div class="table-responsive">
					<p>
						<?= Html::a('Add Team', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
							return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['team/update', 'id' => $model->id]).'"'];
						},
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							[
								'attribute' => 'type',
								'value' => function($data){
									return (SportTypes::$types[$data->type]);
								},
							],
							'name',
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
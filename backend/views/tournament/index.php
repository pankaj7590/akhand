<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\SportTypes;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TournamentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tournaments';
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-flag-checkered"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="member-index">
				<div class="table-responsive">
					<p>
						<?= Html::a('Add Tournament', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
							return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['tournament/update', 'id' => $model->id]).'"'];
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
							'from_date',
							'to_date',
							'entry_fee',
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
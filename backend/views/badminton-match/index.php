<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\MatchStatuses;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BadmintonMatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Badminton Matches';
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-flag"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="member-index">
				<div class="table-responsive">
					<p>
						<?= Html::a('Add Match', ['create'], ['class' => 'btn btn-success']) ?>
					</p>

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
							return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['badminton-match/update', 'id' => $model->id]).'"'];
						},
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							[
								'attribute' => 'first_team_id',
								'value' => function($data){
									return ($data->firstTeam->name);
								},
							],
							[
								'attribute' => 'second_team_id',
								'value' => function($data){
									return ($data->secondTeam->name);
								},
							],
							[
								'attribute' => 'winner_team_id',
								'value' => function($data){
									return ($data->winnerTeam->name);
								},
							],
							[
								'attribute' => 'status',
								'value' => function($data){
									return (MatchStatuses::$statuses[$data->status]);
								},
							],
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
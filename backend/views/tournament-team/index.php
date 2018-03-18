<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TournamentTeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['tournament/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->tournament->name, 'url' => ['tournament/update', 'id' => $searchModel->tournament_id]];
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
						<?= Html::a('Add Team', ['create', 'id' => $searchModel->tournament_id], ['class' => 'btn btn-success']) ?>
					</p>
					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
							return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['tournament-team/update', 'id' => $model->id]).'"'];
						},
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							[
								'attribute' => 'team_id',
								'value' => function($data){
									return ($data->team->name);
								},
							],
							'entry_fee',
							[
								'attribute' => 'is_paid',
								'value' => function($data){
									return ($data->is_paid?'Yes':'No');
								},
							],
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
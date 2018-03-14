<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrganizationMemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['organization/index']];
$this->params['breadcrumbs'][] = ['label' => $searchModel->organization->name, 'url' => ['organization/update', 'id' => $searchModel->organization_id]];
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-certificate"></i>
			<i class="icon-plus-sign"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="organization-member-index">
				<div class="table-responsive">
					<p>
						<?= Html::a('Add Member', ['create', 'id' => $searchModel->organization_id], ['class' => 'btn btn-success']) ?>
					</p>
					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
							return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['member/update', 'id' => $model->member_id]).'"'];
						},
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],
							[
								'attribute' => 'member_id',
								'value' => function($data){
									return $data->member->name;
								},
							],
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
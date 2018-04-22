<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\SportTypes;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-plus-sign"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="member-index">
				<div class="table-responsive">
					<p>
						<?= Html::a('Add Member', ['create'], ['class' => 'btn btn-success']) ?>
					</p>
					<?= GridView::widget([
						'dataProvider' => $dataProvider,
						'filterModel' => $searchModel,
						'rowOptions' => function ($model, $key, $index, $grid) use ($urlManager) {
							return ['onclick' => 'window.location = "'.$urlManager->createAbsoluteUrl(['member/update', 'id' => $model->id]).'"'];
						},
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],

							[
								'attribute' => 'profile_picture',
								'filter' => false,
								'value' => function($data){
									$fileName = ($data->profilePicture?$data->profilePicture->file_name:"");
									return \common\components\MediaHelper::getImageUrl($fileName);
								},
								'format' => ['image', ['width' => '100px']],
							],
							'name',
							'username',
							'email:email',
							'phone',
							[
								'attribute' => 'interested_sports',
								'filter' => SportTypes::$types,
								'value' => function($data){
									$interested_sports = '';
									if($data->interested_sports){
										foreach($data->interested_sports as $sport){
											$interested_sports .= SportTypes::$types[$sport].', ';
										}
									}
									return trim($interested_sports, ', ');
								}
							],
							[
								'attribute' => 'coach_required',
								'filter' => [1 => 'Yes', 0 => 'No'],
								'value' => function($data){
									return ($data->coach_required?'Yes':'No');
								},
							],
						],
					]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
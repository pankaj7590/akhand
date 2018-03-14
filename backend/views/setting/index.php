<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
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
				<?= GridView::widget([
					'dataProvider' => $dataProvider,
					'filterModel' => $searchModel,
					'columns' => [
						['class' => 'yii\grid\SerialColumn'],

						'name',
						'label',
						'default_value:ntext',
						'value:ntext',
					],
				]); ?>
			</div>
		</div>
	</div>
</div>
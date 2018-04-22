<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use common\components\MediaHelper;

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;
?>
	<div class="store-wrap">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <p class="hidden-md hidden-lg">
                        <button type="button" class="btn sidebar-btn" data-toggle="offcanvas" title="Toggle sidebar">sidebar</button>
                    </p>
                    <div class="row">
						<?php echo ListView::widget([
							'dataProvider' => $dataProvider,
							'itemOptions' => ['class' => 'item'],
							'itemView' => 	function($model) use($urlManager){
								return '<div class="col-md-4 col-sm-6">
											<div class="store-list-item">
												<div>
													<a href="'.$urlManager->createAbsoluteUrl(['gallery/view', 'id' => $model->id]).'">
														<img src="'.MediaHelper::getImageUrl(($model->firstImage?$model->firstImage->media->file_name:'')).'">
													</a>
													<div class="info">
														<span class="name">'.$model->name.'</span>
													</div>
												</div>
											</div>
										</div>';
							},
						]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
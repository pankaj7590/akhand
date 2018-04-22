<?php
use common\components\MediaHelper;

/* @var $this yii\web\View */

$this->title = $model->name;

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
						<?php foreach($model->galleryMedia as $key => $media){?>
							<?php if($key != 0 && $key%3==0){?>
								<div class="clear"></div>
							<?php }?>
							<div class="col-md-4 col-sm-6">
								<div class="store-list-item">
									<div>
										<a data-fancybox="gallery" href="<?= MediaHelper::getImageUrl(($media->media?$media->media->file_name:''))?>">
											<img src="<?= MediaHelper::getImageUrl(($media->media?$media->media->file_name:''))?>">
										</a>
									</div>
								</div>
							</div>
						<?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
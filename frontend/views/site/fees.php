<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use common\models\Setting;

$this->title = 'Fees';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="content">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-left">
                <!--event LIST BEGIN-->
				<div class="news-list col-xs-12 col-md-12">
						<?php
							$feesPageOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_FEES])->all();
							$feesPageOption = [];
							foreach($feesPageOptionModels as $model){
								$feesPageOption[$model->name] = $model;
							}
							$fees_page_content = $feesPageOption['fees_page_content']['value'];
						?>
						<?= $fees_page_content;?>
				</div>
			</div>
		</div>
	</div>
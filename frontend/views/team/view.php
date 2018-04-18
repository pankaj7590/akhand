<?php

/* @var $this yii\web\View */

$this->title = 'Team';

$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;
?>
<!--CLUB STAFF TOP BEGIN-->
    <div class="club-staff-top">
        <div class="container">
            <div class="row">
				<div class="staff-box">
					<?php foreach($model->teamMembers as $teamMember){?>
						<div class="col-md-4  col-sm-6 col-xs-12">
							<a class="item">
								<span class="info">
									<span class="name"><?= $teamMember->member->name;?></span>
								</span>
								<img src="<?= \common\components\MediaHelper::getImageUrl(($teamMember?$teamMember->member->profilePicture->file_name:""))?>" alt="player">
							</a>
						</div>
					<?php }?>
				</div>
            </div>
        </div>
    </div>
<?php
use yii\widgets\ListView;
use common\components\MediaHelper;

/* @var $this yii\web\View */

$this->title = 'Ball Badminton Matches';

$this->params['breadcrumbs'][] = $this->title;

$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;
?>
<!--MAIN MATCH SHEDULE BEGIN-->
    <section class="main-match-shedule amateurs-match-shedule">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="main-lates-matches">
					<?php echo ListView::widget([
						'dataProvider' => $dataProvider,
						'itemOptions' => ['class' => 'item'],
						'itemView' => 	function($model) use($urlManager){
							return '<a href="'.$urlManager->createAbsoluteUrl(['match/view', 'id' => $model->id]).'" class="item">
										<span class="teams-wrap">
											<span class="team">
												<span>
													<img src="'.$baseUrl.'/images/common/team-logo1.png" alt="team-image">
												</span>
												<span>'.$model->firstTeam->name.'</span>
											</span>
											<span class="score">
												<span>Vs</span>
											</span>
											<span class="team1">
												<span>'.$model->secondTeam->name.'</span>
												<span><img src="'.$baseUrl.'/images/common/team-logo2.png" alt="team-image"></span>
											</span>
										</span>
									</a>';
						},
						]);
					?>
					</div>
                </div>
            </div>
        </div>
    </section>
    <!--MAIN MATCH SHEDULE END-->
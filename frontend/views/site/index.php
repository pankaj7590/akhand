<?php
use common\models\Setting;
use common\models\Media;
use common\components\MediaHelper;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;

$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;
?>
	<?php
		$homePageOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HOME])->all();
		$homePageOptions = [];
		foreach($homePageOptionModels as $model){
			$homePageOptions[$model->name] = $model;
		}
		$home_page_success_story_title = $homePageOptions['home_page_success_story_title']['value'];
		$home_page_success_story_subtitle = $homePageOptions['home_page_success_story_subtitle']['value'];
		$home_page_success_story_description = $homePageOptions['home_page_success_story_description']['value'];
		$home_page_join_us_title = $homePageOptions['home_page_join_us_title']['value'];
		$home_page_join_us_button_text = $homePageOptions['home_page_join_us_button_text']['value'];
		$home_page_join_us_button_link = $homePageOptions['home_page_join_us_button_link']['value'];
		$home_page_sponsors_slider_logos = $homePageOptions['home_page_sponsors_slider_logos']['value'];
		$home_page_sponsors_slider_logos_arr = [];
		if($home_page_sponsors_slider_logos){
			$temp = json_decode($home_page_sponsors_slider_logos);
			foreach($temp as $media){
				$mediaModel = Media::findOne($media);
				if($mediaModel){
					$home_page_sponsors_slider_logos_arr[] = MediaHelper::getImageUrl($mediaModel->file_name);
				}
			}
		}
		$home_page_main_slider_bg = $homePageOptions['home_page_main_slider_bg'];
		if($home_page_main_slider_bg->media){
			$home_page_main_slider_bg_url = MediaHelper::getImageUrl($home_page_main_slider_bg->media->file_name);
		}else{
			$home_page_main_slider_bg_url = $baseUrl.'/images/soccer/main-slider.jpg';
		}
		$this->registerCss("
			.main-slider-section {
				background: url(".$home_page_main_slider_bg_url.") no-repeat!important;
				background-size: cover;
			}
		");
	?>
    <div class="main-slider-section">
		<div class="main-slider">
			<div id="main-slider" class="carousel slide" data-ride="carousel" data-interval="4000">
				<div class="carousel-inner" role="listbox">
					<?php foreach($recentCricketMatches as $key => $match){?>
						<div class="item <?= $key == 0?'active':''?>">
							<div class="main-slider-caption">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="team"> 
												<?= $match->firstTeam->name;?>
												<div class="big-count">
													<?= ($match->first_team_score?$match->first_team_score:0);?>:<?= ($match->second_team_score?$match->second_team_score:0);?>
												</div>
												<?= $match->secondTeam->name;?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
					<?php foreach($recentBadmintonMatches as $match){?>
						<div class="item">
							<div class="main-slider-caption">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="team"> 
												<?= $match->firstTeam->name;?>
												<div class="big-count">
													<?= ($match->first_team_points?$match->first_team_points:0);?>:<?= ($match->second_team_points?$match->second_team_points:0);?>
												</div>
												<?= $match->secondTeam->name;?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
					<?php foreach($recentBallbadmintonMatches as $match){?>
						<div class="item">
							<div class="main-slider-caption">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="team"> 
												<?= $match->firstTeam->name;?>
												<div class="big-count">
													<?= ($match->first_team_points?$match->first_team_points:0);?>:<?= ($match->second_team_points?$match->second_team_points:0);?>
												</div>
												<?= $match->secondTeam->name;?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
				</div>

				<!-- Controls -->
				<a class="nav-arrow left-arrow" href="#main-slider" role="button" data-slide="prev">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					<span class="sr-only"></span>
				</a>
				<a class="nav-arrow right-arrow" href="#main-slider" role="button" data-slide="next">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
					<span class="sr-only"></span>
				</a>
			</div>
		</div>
	</div>

    <!--MAIN PLAYERS STAT BEGIN-->

    <section class="main-players-stat bg-cover">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="hockey-stats-h4">Player Details</h4>
					<div class="single-player-stats players_statistic_slider">
						<div class="player-stat-slider tab-content">      
							<div id="slider" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner tab-content" role="listbox">
									<?php foreach($players as $key => $player){?>
										<div class="item <?= ($key == 0?'active':'')?> tab-pane">
											<div class="wrap">
												<div class="stat">
													<div class="top-info with_number">
														<a class="">
															<?= $player->name;?>
														</a>
													</div>
													<div class="progress-wrap">
														<div class="progress-item">
															<div class="bar-label">
																<div class="achievement">Cricket Matches</div>
																<div class="score"><?= count($player->matchPlayers)?></div>
															</div>
															<div class="progress-line">
																<div class="bar bar-1" ></div>
															</div>
														</div>
														<div class="progress-item">
															<div class="bar-label">
																<div class="achievement">Badminton Matches</div>
																<div class="score"><?= count($player->badmintonMatchPlayers)?></div>
															</div>
															<div class="progress-line">
																<div class="bar bar-1" ></div>
															</div>
														</div>
														<div class="progress-item">
															<div class="bar-label">
																<div class="achievement">Ball Badminton Matches</div>
																<div class="score"><?= count($player->ballBadmintonMatchPlayers)?></div>
															</div>
															<div class="progress-line">
																<div class="bar bar-1" ></div>
															</div>
														</div>
													</div>
												</div>
												<div class="image">
													<a href="player-second-page.html" title="player-image">
														<img src="<?= MediaHelper::getImageUrl(($player->profilePicture?$player->profilePicture->file_name:''))?>" alt="player-image">
													</a>
												</div>	
											</div>
										</div>
									<?php }?>
									<div class="arrow-wrap">
										<!-- Controls -->
										<a class="nav-arrow left-arrow" href="#slider" role="button" data-slide="prev">
											<i class="fa fa-caret-left" aria-hidden="true"></i>
											<span class="sr-only">Previous</span>
										</a>
										<a class="nav-arrow right-arrow" href="#slider" role="button" data-slide="next">
											<i class="fa fa-caret-right" aria-hidden="true"></i>
											<span class="sr-only">Next</span>
										</a>
									</div>  
								</div>
							</div>
						</div>
					</div>
                </div>
                <div class="col-md-5">
                    <h4 class = "hockey-stats-h4">Players</h4>
                    <div class="team-best-player">
						<div class="tab-content">
							<div class="best-players-list tab-pane active" id="goals">
								<?php foreach($players as $key => $player){?>
									<a class="item">
										<span class="number"><?= $key+1;?></span>
										<span><?= $player->name;?></span>
									</a>
								<?php }?>  
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </section>

    <!--MAIN PLAYERS STAT END-->

    <!--SUCCESS STORY BEGIN-->
	<section class="success-story sport">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?= $home_page_success_story_description?>
				</div>
			</div>
		</div>	
	</section>
	<!--SUCCESS STORY END-->
    <!--AWARD BOX BEGIN-->

    <div class="main-award-box">
		<div class="main-award-slider">
			<div id="main-award-slider" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" role="listbox">  
					<div class="item active">
							<div class="container">
								<div class="row">
									<div class="col-xs-4 text-center">
										<div class="award">
											<div class="image"><img class="img-responsive" src="<?= $baseUrl;?>/images/common/cup.png" alt="cup-image"></div>
											<div class="name">All-Star Series</div>
											<div class="year">2016</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<div class="award">
											<div class="image"><img class="img-responsive" src="<?= $baseUrl;?>/images/common/cup1.png" alt="cup-image"></div>
											<div class="name">World Class Championship</div>
											<div class="year">2016</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<div class="award">
											<div class="image"><img class="img-responsive" src="<?= $baseUrl;?>/images/common/cup2.png" alt="cup-image"></div>
											<div class="name">Major League Trophy</div>
											<div class="year">2016</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="container">
								<div class="row">
									<div class="col-xs-4 text-center">
										<div class="award">
											<div class="image"><img class="img-responsive" src="<?= $baseUrl;?>/images/common/cup.png" alt="cup-image"></div>
											<div class="name">All-Star Series</div>
											<div class="year">2016</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<div class="award">
											<div class="image"><img class="img-responsive" src="<?= $baseUrl;?>/images/common/cup1.png" alt="cup-image"></div>
											<div class="name">World Class Championship</div>
											<div class="year">2016</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<div class="award">
											<div class="image"><img class="img-responsive" src="<?= $baseUrl;?>/images/common/cup2.png" alt="cup-image"></div>
											<div class="name">Major League Trophy</div>
											<div class="year">2016</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>

				<!-- Controls -->
				<a class="nav-arrow left-arrow" href="#main-award-slider" role="button" data-slide="prev">
					<i class="fa fa-angle-left" aria-hidden="true"></i>
					<span class="sr-only">Previous</span>
				</a>
				<a class="nav-arrow right-arrow" href="#main-award-slider" role="button" data-slide="next">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
    </div>

    <!--AWARD BOX END-->


    <!--MAIN CLUB STAFF END-->

    <!--CALL TO ACTION BEGIN-->
	<div class="call-to-action">
		<div class="container">
			<div class="row">
				<div class="col-md-9 col-sm-9 col-xs-6">
					<div class="text"><?= $home_page_join_us_title?></div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 text-right">
					<a href="<?= $home_page_join_us_button_link?>" class="join"><?= $home_page_join_us_button_text?></a>
				</div>
			</div>
		</div>
	</div>
	<!--CALL TO ACTION END-->

    <!--MAIN TEAM STORE BEGIN-->

    <section class="main-team-store">
        <!--MAIN SPONSOR SLIDER BEGIN-->
		<div class="main-sponsor-slider-background">
			<div id="main-sponsor-slider" class="carousel slide main-sponsor-slider" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<?php for($outer_i = 0; $outer_i <= count($home_page_sponsors_slider_logos_arr); $outer_i = $outer_i+3){?>
						<?php if($outer_i % 3 == 0){?>
							<div class="item <?= ($outer_i == 0?'active':'')?>">
								<div class="container">
									<div class="row">
						<?php }?>
						<?php for($i = $outer_i; $i < $outer_i+3; $i++){?>
							<div class="col-xs-4 text-center">
								<img class="sponsor-icons" src="<?= (isset($home_page_sponsors_slider_logos_arr[$i])?$home_page_sponsors_slider_logos_arr[$i]:'/images/common/sponsor-img.png')?>" alt="sponsor-image">	
							</div>
						<?php }?>		
						<?php if($outer_i % 3 == 0){?>
									</div>
								</div>	
							</div>
						<?php }?>
					<?php }?>
					<!-- Controls -->
					<a class="nav-arrow left-arrow" href="#main-sponsor-slider" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
					</a>
					<a class="nav-arrow right-arrow" href="#main-sponsor-slider" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
					</a>
				</div>	
			</div>
		</div>
		<!--MAIN SPONSOR SLIDER END-->
    </section>

    <!--MAIN TEAM STORE END-->

    <div class="main-breaking-news">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-3 col-xs-12 ">
					<div class="break-title">
						<span>Breaking news</span>
					</div>
				</div>
				<div class="col-md-10 col-sm-9 col-xs-12">
					<div id="main-breaking-list" class="carousel slide main-breaking-list" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<?php foreach($recentNews as $key => $news){?>
								<div class="item <?= $key == 0?'active':''?>">
									<a href="news.html" class=" ">
										<span class="date">
											<?= $news->news_event_date?><span>/</span>
										</span>	
										<span class="news"><?= $news->title;?></span>
									</a>
								</div>
							<?php }?>
						</div>	
						<div class="arrow-wrap">
							<!-- Controls -->
							<a class="nav-arrow left-arrow" href="#main-breaking-list" role="button" data-slide="prev">
								<i class="fa fa-caret-left" aria-hidden="true"></i>
								<span class="sr-only">Previous</span>
							</a>
							<a class="nav-arrow right-arrow" href="#main-breaking-list" role="button" data-slide="next">
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
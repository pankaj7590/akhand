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
                <div class="col-md-12">
                    <h4>goalkeepers</h4>
                </div>
				<div class="staff-box">            
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player-second-page.html" class="item">
							<span class="info">
								<span class="name">Keevian Treapap</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>                                         
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player.html" class="item">
							<span class="info">
								<span class="name">Pieeraluigi Goellaini</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player-second-page.html" class="item">
							<span class="info">
								<span class="name">Reemiaro</span>
								<span class="position">Goalkeeper</span>
								<span class="number">29</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>   


					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player.html" class="item">
							<span class="info">
								<span class="name">Woejcaiech Szeczaesny</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>     
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player-second-page.html" class="item">
							<span class="info">
								<span class="name">Ireaiazoz</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>       
				</div>
                <div class="col-md-12">
                    <h4>defenders</h4>
                </div>
				<div class="staff-box">            
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player-second-page.html" class="item">
							<span class="info">
								<span class="name">Keevian Treapap</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>                                         
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player.html" class="item">
							<span class="info">
								<span class="name">Pieeraluigi Goellaini</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player-second-page.html" class="item">
							<span class="info">
								<span class="name">Reemiaro</span>
								<span class="position">Goalkeeper</span>
								<span class="number">29</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>   


					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player.html" class="item">
							<span class="info">
								<span class="name">Woejcaiech Szeczaesny</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>     
					<div class="col-md-4  col-sm-6 col-xs-12">
						<a href="player-second-page.html" class="item">
							<span class="info">
								<span class="name">Ireaiazoz</span>
								<span class="position">Goalkeeper</span>
								<span class="number">1</span>
							</span>
							<img src="<?= $baseUrl;?>/images/soccer/staff-item-img.jpg" alt="player">
						</a>
					</div>       
				</div>
                <div class="col-md-12">
                    <p>Pabst irony tattooed, synth sriracha selvage pok pok. Wayfarers kinfolk sartorial, helvetica you probably haven't heard of them tumeric venmo deep v mixtape semiotics brunch. </p>
                </div>
            </div>
        </div>
    </div>
    <!--CLUB STAFF TOP END-->
    <!--MAIN CLUB STAFF BEGIN-->
	<section class="main-club-stuff">    
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="soccer-h4">club stuff</h4>  
					<ul class="player-filters" role="tablist">
						<li class="active">
							<a href="#managers" role="tab" data-toggle="tab">
								Managers                  
							</a>
						</li>
						<li>
							<a href="#firstteam" role="tab" data-toggle="tab">
								First team
							</a>
						</li>
						<li>
							<a href="#academy" role="tab" data-toggle="tab">
								Academy
							</a>
						</li>                  
					</ul>
				</div>
			</div>
		</div>           

		<div class="tab-content">
			<div class="tab-pane active" id="managers" role="tabpanel">
				<div id="managers_carousel" class="carousel slide main-stuff-slider" data-ride="carousel" >
					<div class="carousel-inner" role="listbox" >
						<div class="item active">
							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marshman</span>
													<span class="position">Left Forward</span>
													<span class="number">14</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/stuff-person.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>                    
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marshman</span>
													<span class="position">Left Midfielder</span>
													<span class="number">8</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-2.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>
									<div class="col-md-4 ">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marshman</span>
													<span class="position">Central Attacking Midfielder</span>
													<span class="number">7</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-3.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="item">
							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marshman</span>
													<span class="position">Left Forward</span>
													<span class="number">14</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-3.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>                    
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marshman</span>
													<span class="position">Left Midfielder</span>
													<span class="number">8</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-2.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>
									<div class="col-md-4 ">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marshman</span>
													<span class="position">Central Attacking Midfielder</span>
													<span class="number">7</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/stuff-person.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- Controls -->
						<a class="nav-arrow left-arrow" href="#managers_carousel" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only"></span>
						</a>
						<a class="nav-arrow right-arrow" href="#managers_carousel" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only"></span>
						</a>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="academy" role="tabpanel">
				<div id="academy_carousel" class="carousel slide main-stuff-slider" data-ride="carousel" >
					<div class="carousel-inner" role="listbox" >
						<div class="item active">
							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Vito<br>Palet</span>
													<span class="position">Left Forward</span>
													<span class="number">14</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-2.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>                    
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Melet</span>
													<span class="position">Left Midfielder</span>
													<span class="number">8</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/stuff-person.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>
									<div class="col-md-4 ">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marse</span>
													<span class="position">Central Attacking Midfielder</span>
													<span class="number">7</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-3.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="item">
							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marsan</span>
													<span class="position">Left Forward</span>
													<span class="number">14</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-3.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>                    
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Luscas<br>Mars</span>
													<span class="position">Left Midfielder</span>
													<span class="number">8</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-2.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>
									<div class="col-md-4 ">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Mafo</span>
													<span class="position">Central Attacking Midfielder</span>
													<span class="number">7</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/stuff-person.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- Controls -->
						<a class="nav-arrow left-arrow" href="#academy_carousel" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only"></span>
						</a>
						<a class="nav-arrow right-arrow" href="#academy_carousel" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only"></span>
						</a>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="firstteam" role="tabpanel">
				<div id="firstteam_carousel" class="carousel slide main-stuff-slider" data-ride="carousel" >
					<div class="carousel-inner" role="listbox" >
						<div class="item active">
							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">James<br>Deshon</span>
													<span class="position">Left Forward</span>
													<span class="number">14</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/stuff-person.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>                    
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Deshon<br>James</span>
													<span class="position">Left Midfielder</span>
													<span class="number">8</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/stuff-person.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>
									<div class="col-md-4 ">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">James<br>Deshon</span>
													<span class="position">Central Attacking Midfielder</span>
													<span class="number">7</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-3.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="item">
							<div class="container">
								<div class="row">
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucas<br>Marsh</span>
													<span class="position">Left Forward</span>
													<span class="number">14</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-3.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>                    
									<div class="col-md-4">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Luca<br>Mas</span>
													<span class="position">Left Midfielder</span>
													<span class="number">8</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/player-2.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>
									<div class="col-md-4 ">
										<div class="staff-item">
											<a href="staff.html">
												<span class="info">
													<span class="name">Lucasoto<br>Marsh</span>
													<span class="position">Central Attacking Midfielder</span>
													<span class="number">7</span>
												</span>
												<img src="<?= $baseUrl;?>/images/soccer/stuff-person.jpg"  alt="person-slider">
											</a>	
										</div>
									</div>

								</div>
							</div>
						</div>
						<!-- Controls -->
						<a class="nav-arrow left-arrow" href="#firstteam_carousel" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only"></span>
						</a>
						<a class="nav-arrow right-arrow" href="#firstteam_carousel" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--MAIN CLUB STAFF END-->

    <!--SPONSOR BOX BEGIN-->
	<div class="am-sponsor-box">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <p class="text">Whatever copper mug etsy, tilde listicle hammock gastropub literally franzen fanny pack typewriter meditation.<br> Organic chartreuse bicycle rights pinterest, cray humblebrag fap gochujang church-key brooklyn food truck letterpress cred. </p>
                </div>
                <div class="col-xs-3 text-center">
                    <img  class="sponsor-icons" src="<?= $baseUrl;?>/images/common/sponsor-img3.png" alt="sponsor image">	
                </div>
                <div class="col-xs-3 text-center">
                    <img class="sponsor-icons" src="<?= $baseUrl;?>/images/common/sponsor-img.png" alt="sponsor image">	
                </div>
                <div class="col-xs-3 text-center">
                    <img  class="sponsor-icons" src="<?= $baseUrl;?>/images/common/sponsor-img1.png" alt="sponsor image">	
                </div>
                <div class="col-xs-3 text-center">
                    <img  class="sponsor-icons" src="<?= $baseUrl;?>/images/common/sponsor-img2.png" alt="sponsor image">	
                </div>
            </div>
        </div>
    </div>
	<!--SPONSOR BOX END-->
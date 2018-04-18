<?php 
$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

$this->title = "Teams";
?>
<section class="main-players-stat bg-cover">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="team-best-player">
					<div class="">
						<ul class="player-filters" role="tablist">
							<?php 
								$counter = 1;
								foreach($teams as $type => $dataProvider){
							?>
								<li class="<?= ($counter === 1?'active':'')?>">
									<a href="#type<?= $counter?>" role="tab" data-toggle="tab"><?= $type?></a>
								</li>
							<?php 
									$counter++;
								}
							?>
						</ul>    
					</div>
					<div class="tab-content">
						<?php 
							$counter = 1;
							foreach($teams as $type => $dataProvider){
								$icon = 'shuttle.png';
								switch($type){
									case 'Ball Badminton':
										$icon = 'ball-badminton-ball.png';
										break;
									case 'Cricket':
										$icon = 'cricket-ball.png';
										break;
								}
						?>
							<div class="best-players-list tab-pane <?= ($counter === 1?'active':'')?>" id="type<?= $counter?>">
								<?php foreach($dataProvider->getModels() as $team){?>
									<a href="<?= $urlManager->createAbsoluteUrl(['team/view', 'id' => $team->id]);?>" class="item">
										<span class="number"><img src="<?= $baseUrl?>/images/<?= $icon;?>"/></span>
										<span><?= $team->name;?></span>
									</a>
								<?php }?>
							</div>
						<?php 
								$counter++;
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
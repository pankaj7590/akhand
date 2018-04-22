<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use common\components\MediaHelper;
use common\models\Media;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Theme Options';
$this->params['breadcrumbs'][] = $this->title;
$urlManager = Yii::$app->urlManager;
?>
<div class="span12">
	<div class="widget">
		<div class="widget-header">
			<i class="icon-gears"></i>
	      	<h3><?= Html::encode($this->title) ?></h3>
	  	</div>
		<div class="widget-content">
			<div class="setting-index">
				<div class="tab">
				  <button class="tablinks" onclick="openTab(event, 'HeaderOption')" id="defaultOpen">Header</button>
				  <button class="tablinks" onclick="openTab(event, 'FooterOption')">Footer</button>
				  <button class="tablinks" onclick="openTab(event, 'HomePageOption')">Home Page</button>
				  <button class="tablinks" onclick="openTab(event, 'ContactPageOption')">Contact Page</button>
				  <button class="tablinks" onclick="openTab(event, 'FeesPageOption')">Fees Page</button>
				</div>
				<form id="theme-options-form" method="post" enctype="multipart/form-data">
					<input type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>">
					<div id="HeaderOption" class="tabcontent">
						<div class="form-group field-themeoption-home_page_social">
							<h3>Social Media Links</h3>
							<div class="clearfix">
								<?php 
									$facebook = $headerOptions['facebook']['value'];
									$twitter = $headerOptions['twitter']['value'];
									$gplus = $headerOptions['gplus']['value'];
									$pinterest = $headerOptions['pinterest']['value'];
									$instagram = $headerOptions['instagram']['value'];
									$header_phone = $headerOptions['header_phone']['value'];
									$header_email = $headerOptions['header_email']['value'];
									$menu_bar_logo = $headerOptions['menu_bar_logo'];
									
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-twitter">Twitter</label>';
										echo '<input type="text" id="themeoption-twitter" class="form-control" name="twitter" value="'.$twitter.'"/>';
										echo '<label class="control-label" for="themeoption-facebook">Facebook</label>';
										echo '<input type="text" id="themeoption-facebook" class="form-control" name="facebook" value="'.$facebook.'">';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-gplus">G+</label>';
										echo '<input type="text" id="themeoption-gplus" class="form-control" name="gplus" value="'.$gplus.'">';
										echo '<label class="control-label" for="themeoption-pinterest">Pinterest</label>';
										echo '<input type="text" id="themeoption-pinterest" class="form-control" name="pinterest" value="'.$pinterest.'"/>';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-instagram">Instagram</label>';
										echo '<input type="text" id="themeoption-instagram" class="form-control" name="instagram" value="'.$instagram.'">';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-header_phone">Phone</label>';
										echo '<input type="text" id="themeoption-header_phone" class="form-control" name="header_phone" value="'.$header_phone.'">';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-header_email">Email</label>';
										echo '<input type="text" id="themeoption-header_email" class="form-control" name="header_email" value="'.$header_email.'">';
									echo '</div>';
									if($menu_bar_logo->media){
										echo "<div class='setting-media-container'>";
											echo "<img src='".MediaHelper::getImageUrl($menu_bar_logo->media->file_name)."' width='100px'>";
										echo "</div>";
									}
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-menu_bar_logo">Menu Bar Logo</label>';
										echo '<input type="file" id="themeoption-menu_bar_logo" class="form-control" name="menu_bar_logo">';
									echo '</div>';
								?>
							</div>
						</div>
					</div>
					<div id="FooterOption" class="tabcontent">
						<div class="form-group field-themeoption-home_page_testimonials">
							<h4>Footer</h4>
							<div class="clearfix">
								<?php 
									$footer_description = $footerOptions['footer_description']['value'];
									$footer_contact_address = $footerOptions['footer_contact_address']['value'];
									$footer_contact_email = $footerOptions['footer_contact_email']['value'];
									$footer_contact_phone = $footerOptions['footer_contact_phone']['value'];
									$footer_developer = $footerOptions['footer_developer']['value'];
									$footer_copyright = $footerOptions['footer_copyright']['value'];
									$footer_quick_links = [];
									for($i=1;$i<=6;$i++){
										$key = 'footer_quick_link_'.$i.'_label';
										$value = 'footer_quick_link_'.$i.'_link';
										$footer_quick_links[] = [
											'label' => $footerOptions[$key],
											'link' => $footerOptions[$value],
										];
									}
									// echo "<pre>";print_r($footer_quick_links);exit;
									
									echo '<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">';
										echo '<label class="control-label" for="themeoption-footer_description">Description</label>';
										echo '<textarea id="themeoption-footer_description" class="form-control" name="footer_description" rows="5">'.$footer_description.'</textarea>';
									echo '</div>';
									echo '<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">';
										echo '<label class="control-label" for="themeoption-footer_contact_address">Address</label>';
										echo '<textarea id="themeoption-footer_contact_address" class="form-control" name="footer_contact_address" rows="5">'.$footer_contact_address.'</textarea>';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-footer_contact_email">Email</label>';
										echo '<input type="text" id="themeoption-footer_contact_email" class="form-control" name="footer_contact_email" value="'.$footer_contact_email.'"/>';
										echo '<label class="control-label" for="themeoption-footer_contact_phone">Phone</label>';
										echo '<input type="text" id="themeoption-footer_contact_phone" class="form-control" name="footer_contact_phone" value="'.$footer_contact_phone.'">';
										echo '<label class="control-label" for="themeoption-footer_developer">Developer</label>';
										echo '<input type="text" id="themeoption-footer_developer" class="form-control" name="footer_developer" value="'.$footer_developer.'">';
										echo '<label class="control-label" for="themeoption-footer_copyright">Copyright</label>';
										echo '<input type="text" id="themeoption-footer_copyright" class="form-control" name="footer_copyright" value="'.$footer_copyright.'">';
									echo '</div>';
									foreach($footer_quick_links as $key => $value){
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											echo '<label class="control-label" for="themeoption-'.$value['label']['name'].'">'.$value['label']['label'].'</label>';
											echo '<input type="text" id="themeoption-'.$value['label']['name'].'" class="form-control" name="'.$value['label']['name'].'" value="'.$value['label']['value'].'"/>';
										echo '</div>';
										echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
											echo '<label class="control-label" for="themeoption-'.$value['link']['name'].'">'.$value['link']['label'].'</label>';
											echo '<input type="text" id="themeoption-'.$value['link']['name'].'" class="form-control" name="'.$value['link']['name'].'" value="'.$value['link']['value'].'"/>';
										echo '</div>';
									}
								?>
							</div>
						</div>
					</div>
					<div id="HomePageOption" class="tabcontent">
								<?php 
									$home_page_main_slider_bg = $homePageOptions['home_page_main_slider_bg'];
									$home_page_success_story_image = $homePageOptions['home_page_success_story_image']['value'];
									$home_page_success_story_title = $homePageOptions['home_page_success_story_title']['value'];
									$home_page_success_story_subtitle = $homePageOptions['home_page_success_story_subtitle']['value'];
									$home_page_success_story_description = $homePageOptions['home_page_success_story_description']['value'];
									$home_page_join_us_title = $homePageOptions['home_page_join_us_title']['value'];
									$home_page_join_us_button_text = $homePageOptions['home_page_join_us_button_text']['value'];
									$home_page_join_us_button_link = $homePageOptions['home_page_join_us_button_link']['value'];
									$home_page_sponsors_slider_logos = $homePageOptions['home_page_sponsors_slider_logos'];
									// echo "<pre>";print_r($footer_quick_links);exit;
									
									if($home_page_main_slider_bg->media){
										echo "<div class='setting-media-container mt20'>";
											echo "<img src='".MediaHelper::getImageUrl($home_page_main_slider_bg->media->file_name)."' width='100px'>";
										echo "</div>";
									}
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_main_slider_bg">Home Page Main Slider Background Image</label>';
										echo '<input type="file" id="themeoption-home_page_main_slider_bg" class="form-control" name="home_page_main_slider_bg"/>';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_success_story_title">Home Page Success Story Title</label>';
										echo '<input type="text" id="themeoption-home_page_success_story_title" class="form-control" name="home_page_success_story_title" value="'.$home_page_success_story_title.'"/>';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_success_story_subtitle">Home Page Success Story Sub Title</label>';
										echo '<input type="text" id="themeoption-home_page_success_story_subtitle" class="form-control" name="home_page_success_story_subtitle" value="'.$home_page_success_story_subtitle.'"/>';
									echo '</div>';
									echo '<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_success_story_description">Home Page Success Story Description</label>';
										echo '<textarea id="themeoption-home_page_success_story_description" class="form-control" name="home_page_success_story_description" rows="5">'.$home_page_success_story_description.'</textarea>';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_join_us_title">Join Us Section Title</label>';
										echo '<input type="text" id="themeoption-home_page_join_us_title" class="form-control" name="home_page_join_us_title" value="'.$home_page_join_us_title.'"/>';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_join_us_button_text">Join Us Section Button Text</label>';
										echo '<input type="text" id="themeoption-home_page_join_us_button_text" class="form-control" name="home_page_join_us_button_text" value="'.$home_page_join_us_button_text.'"/>';
									echo '</div>';
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_join_us_button_link">Join Us Section Button Link</label>';
										echo '<input type="text" id="themeoption-home_page_join_us_button_link" class="form-control" name="home_page_join_us_button_link" value="'.$home_page_join_us_button_link.'"/>';
									echo '</div>';
									if($home_page_sponsors_slider_logos->value){
										$logos = json_decode($home_page_sponsors_slider_logos->value);
										foreach($logos as $logo){
											$logoModel = Media::findOne($logo);
											if($logoModel){
												echo "<div class='setting-media-container mt20 float-left'>";
													echo "<img src='".MediaHelper::getImageUrl($logoModel->file_name)."' width='100px'>";
												echo "</div>";
											}
										}
										echo "<div class='clearfix'></div>";
									}
									echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
										echo '<label class="control-label" for="themeoption-home_page_sponsors_slider_logos">Home Page Sponsor Slider Logos</label>';
										echo '<input type="file" id="themeoption-home_page_sponsors_slider_logos" class="form-control" name="home_page_sponsors_slider_logos[]" multiple/>';
									echo '</div>';
								?>
					</div>
					<div id="ContactPageOption" class="tabcontent">
						<?php 
							$contact_map_address = $contactPageOptions['contact_map_address']['value'];
							// echo "<pre>";print_r($footer_quick_links);exit;
									
							echo '<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">';
								echo '<label class="control-label" for="themeoption-contact_map_address">Contact Page Map Address/Coordinates</label>';
								echo '<input type="text" id="themeoption-contact_map_address" class="form-control" name="contact_map_address" value="'.$contact_map_address.'"/>';
							echo '</div>';
						?>
					</div>
					<div id="FeesPageOption" class="tabcontent">
						<?php 
							$fees_page_content = $feesPageOptions['fees_page_content']['value'];
							// echo "<pre>";print_r($footer_quick_links);exit;
									
							echo '<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">';
								echo '<label class="control-label" for="themeoption-fees_page_content">Fees Page Content</label>';
								echo '<textarea id="themeoption-fees_page_content" class="form-control" name="fees_page_content">'.$fees_page_content.'</textarea>';
							echo '</div>';
						?>
					</div>
					<div class="clear"></div>
					<div class="form-group text-right mt20">
						<button type="submit" class="btn btn-success">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
$this->registerCss("
	/* Style the tab */
	.tab {
		float: left;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
		width: 20%;
	}

	/* Style the buttons that are used to open the tab content */
	.tab button {
		display: block;
		background-color: inherit;
		color: black;
		padding: 22px 16px;
		width: 100%;
		border: none;
		outline: none;
		text-align: left;
		cursor: pointer;
		transition: 0.3s;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
		background-color: #ddd;
	}

	/* Create an active/current 'tab button' class */
	.tab button.active {
		background-color: #ccc;
	}

	/* Style the tab content */
	.tabcontent {
		float: left;
		padding: 0px 12px;
		border: 1px solid #ccc;
		width: 77%;
	}
");

$this->registerJs("
	function openTab(evt, tabName) {
		// Declare all variables
		var i, tabcontent, tablinks;

		// Get all elements with class='tabcontent' and hide them
		tabcontent = document.getElementsByClassName('tabcontent');
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = 'none';
		}

		// Get all elements with class='tablinks' and remove the class 'active'
		tablinks = document.getElementsByClassName('tablinks');
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(' active', '');
		}

		// Show the current tab, and add an 'active' class to the link that opened the tab
		document.getElementById(tabName).style.display = 'block';
		evt.currentTarget.className += ' active';
	}
	// Get the element with id='defaultOpen' and click on it
	document.getElementById('defaultOpen').click();
", View::POS_END, "vertical-tabs");
?>
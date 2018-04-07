<?php

use yii\db\Migration;

/**
 * Class m180403_184014_add_site_settings
 */
class m180403_184014_add_site_settings extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
		//social links
		$this->insert('setting', ['name' => 'facebook','label' => 'Facebook','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'twitter','label' => 'Twitter','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'gplus','label' => 'Google Plus','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'pinterest','label' => 'Pinterest','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'instagram','label' => 'Instagram','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//header email and phone
		$this->insert('setting', ['name' => 'header_phone','label' => 'Header Phone','default_value' => '+8956 617 443','value' => '+8956 617 443','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'header_email','label' => 'Header Email','default_value' => 'pankaj@salokhe.in','value' => '+8956 617 443','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//logo
		$this->insert('setting', ['name' => 'menu_bar_logo','label' => 'Menu Bar Logo','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//description at footer present along quick links
		$this->insert('setting', ['name' => 'footer_description','label' => 'Footer Description','default_value' => 'Activated charcoal trust fund ugh prism af, beard marfa air plant stumptown gastropub farm-to-table jianbing.','value' => 'Activated charcoal trust fund ugh prism af, beard marfa air plant stumptown gastropub farm-to-table jianbing.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//quick link labels and links
		$this->insert('setting', ['name' => 'footer_quick_link_1_label','label' => 'Footer Quick Link 1 Label','default_value' => 'FIRST TEAM','value' => 'FIRST TEAM','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_1_link','label' => 'Footer Quick Link 1 Link','default_value' => 'http://sportsclub.local/index.php?r=site%2Findex','value' => 'http://sportsclub.local/index.php?r=site%2Findex','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_2_label','label' => 'Footer Quick Link 2 Label','default_value' => 'AMATEURS','value' => 'AMATEURS','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_2_link','label' => 'Footer Quick Link 2 Link','default_value' => 'http://sportsclub.local/index.php?r=site%2Findex','value' => 'http://sportsclub.local/index.php?r=site%2Findex','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_3_label','label' => 'Footer Quick Link 3 Label','default_value' => 'TROPHIES','value' => 'TROPHIES','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_3_link','label' => 'Footer Quick Link 3 Link','default_value' => 'http://sportsclub.local/index.php?r=site%2Findex','value' => 'http://sportsclub.local/index.php?r=site%2Findex','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_4_label','label' => 'Footer Quick Link 4 Label','default_value' => 'SECOND TEAM','value' => 'SECOND TEAM','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_4_link','label' => 'Footer Quick Link 4 Link','default_value' => 'http://sportsclub.local/index.php?r=site%2Findex','value' => 'http://sportsclub.local/index.php?r=site%2Findex','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_5_label','label' => 'Footer Quick Link 5 Label','default_value' => 'DONATION','value' => 'DONATION','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_5_link','label' => 'Footer Quick Link 5 Link','default_value' => 'http://sportsclub.local/index.php?r=site%2Findex','value' => 'http://sportsclub.local/index.php?r=site%2Findex','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_6_label','label' => 'Footer Quick Link 6 Label','default_value' => 'AMATEURS','value' => 'AMATEURS','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_quick_link_6_link','label' => 'Footer Quick Link 6 Link','default_value' => 'http://sportsclub.local/index.php?r=site%2Findex','value' => 'http://sportsclub.local/index.php?r=site%2Findex','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//footer address, email and phone
		$this->insert('setting', ['name' => 'footer_contact_address','label' => 'Footer Contact Us Address','default_value' => '276 Upper Parliament Street, Liverpool L8, Great Britain','value' => '276 Upper Parliament Street, Liverpool L8, Great Britain','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_contact_email','label' => 'Footer Contact Us Email','default_value' => 'pankaj@salokhe.in','value' => 'pankaj@salokhe.in','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_contact_phone','label' => 'Footer Contact Us Phone','default_value' => '+8956 617 443','value' => '+8956 617 443','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//copyright text after current year and developer name
		$this->insert('setting', ['name' => 'footer_copyright','label' => 'Footer Copyright','default_value' => 'AKHAND SPORTS CLUB','value' => 'AKHAND SPORTS CLUB','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'footer_developer','label' => 'Footer Developer','default_value' => 'PANKAJ SALOKHE','value' => 'PANKAJ SALOKHE','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//contact page map address or coordinates of the office
		$this->insert('setting', ['name' => 'contact_map_address','label' => 'Contact Map Address/Coordinates','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//home page slider background
		$this->insert('setting', ['name' => 'home_page_main_slider_bg','label' => 'Home Page Main Slider Background','default_value' => null,'value' => null,'status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//home page success story section
		$this->insert('setting', ['name' => 'home_page_success_story_image','label' => 'Home Page Success Story Image','default_value' => '','value' => '','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'home_page_success_story_title','label' => 'Home Page Success Story Title','default_value' => 'Austin mustache man bun vice helvetica.','value' => 'Austin mustache man bun vice helvetica.','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'home_page_success_story_subtitle','label' => 'Home Page Success Story Sub Title','default_value' => 'BRANDON CAMPBELL / HEAD COACH','value' => 'BRANDON CAMPBELL / HEAD COACH','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'home_page_success_story_description','label' => 'Home Page Success Story Description','default_value' => '<div class="col-md-7">
                <h4>success story <br>began here</h4>
                <p>Pabst irony tattooed, synth sriracha selvage pok pok. Wayfarers kinfolk sartorial, helvetica you probably haven\'t heard of them tumeric venmo deep mixtape semiotics brunch. </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="title">Legendary</div>
                        <p>Next level paleo taxidermy, bespoke messenger bag leggings occupy food truck. </p>
                    </div>
                    <div class="col-md-6">
                        <div class="title">Legendary</div>
                        <p>Wayfarers kinfolk sartorial, helvetica you probably haven\'t heard of them tumeric venmo deep v mixtape semiotics brunch. </p>
                    </div>
                    <div class="col-md-12"><a href="trophies.html" class="booking">trophies</a></div>
                </div>
            </div>','value' => '<div class="col-md-7">
                <h4>success story <br>began here</h4>
                <p>Pabst irony tattooed, synth sriracha selvage pok pok. Wayfarers kinfolk sartorial, helvetica you probably haven\'t heard of them tumeric venmo deep mixtape semiotics brunch. </p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="title">Legendary</div>
                        <p>Next level paleo taxidermy, bespoke messenger bag leggings occupy food truck. </p>
                    </div>
                    <div class="col-md-6">
                        <div class="title">Legendary</div>
                        <p>Wayfarers kinfolk sartorial, helvetica you probably haven\'t heard of them tumeric venmo deep v mixtape semiotics brunch. </p>
                    </div>
                    <div class="col-md-12"><a href="trophies.html" class="booking">trophies</a></div>
                </div>
            </div>','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//join us section
		$this->insert('setting', ['name' => 'home_page_join_us_title','label' => 'Home Page Join Us Title','default_value' => 'BECOME PART OF A GREAT TEAM','value' => 'BECOME PART OF A GREAT TEAM','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'home_page_join_us_button_text','label' => 'Home Page Join Us Button Text','default_value' => 'JOIN US','value' => 'JOIN US','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		$this->insert('setting', ['name' => 'home_page_join_us_button_link','label' => 'Home Page Join Us Button Link','default_value' => '','value' => '','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
		
		//sponsors slider section
		$this->insert('setting', ['name' => 'home_page_sponsors_slider_logos','label' => 'Home Page Sponsors Slider Logos','default_value' => '','value' => '','status' => 10,'created_by' => null,'updated_by' => null,'created_at' => time(),'updated_at' => time(),]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180403_184014_add_site_settings cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180403_184014_add_site_settings cannot be reverted.\n";

        return false;
    }
    */
}

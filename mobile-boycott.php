<?php
// LICENSE

// This program is open source product; you can redistribute it and/or
// modify it under the terms of the GNU Lesser General Public License (LGPL)
// as published by the Free Software Foundation; either version 3
// of the License, or (at your option) any later version.

// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Lesser General Public License for more details.

// You should have received a copy of the GNU Lesser General Public License
// along with this program.  If not, see <http://www.gnu.org/licenses/>.


/*
Plugin Name: Mobile Boycott
Plugin URI: http://wordpress.org/extend/plugins/mobile-boycott
Description: Syrian Mobile Companies Boycott Campaign - الحملة السورية لمقاطعة الموبايل
Version: 0.3
Author: Khaled
Author URI: http://wordpress.org/extend/plugins/mobile-boycott
*/

// This prints the widget
	function MobileBoycottWidgetShow($args) {
	
		extract($args);

		$MobileBoycottTitle = get_option('MobileBoycottTitle');

?>
		<div class="widget_mobile_boycott">
			<?php echo $before_title.$MobileBoycottTitle.$after_title;?>
			<?php echo $before_widget;?>
			<div class="mobile_boycott_content">
				<div class="mobile_boycott_b">
					<a href="http://www.syrian-sport.net/nomobile/" title="الحملة السورية لمقاطعة الموبايل" target="_blank">
						<img src="<?php bloginfo('url'); ?>/wp-content/plugins/mobile-boycott/logo.jpg" alt="صورة الحملة السورية لمقاطعة الموبايل"/>
					</a>
				</div>
			</div>
			<?php echo $after_widget;?>
		</div>
<?php
	}

	function MobileBoycottWidgetInit() {
		// Tell Dynamic Sidebar about our new widget and its control
		register_sidebar_widget(array('الحملة السورية لمقاطعة الموبايل', 'widgets'), 'MobileBoycottWidgetShow');
		register_widget_control(array('الحملة السورية لمقاطعة الموبايل', 'widgets'), 'MobileBoycottWidgetInitForm');
	}

	function MobileBoycottWidgetInitForm() {	
		if ($_POST['MobileBoycottTitle']) {
			update_option('MobileBoycottTitle', $_POST['MobileBoycottTitle']);
		}

        $title = get_option('MobileBoycottTitle');

		if ($title == '') {
			$title = 'الحملة السورية لمقاطعة الموبايل';
		}

?>
		Title:
		<input type="text" name="MobileBoycottTitle" value="<?php echo $title;?>" />
		<a href="http://www.syrian-sport.net/nomobile/" title="الحملة السورية لمقاطعة الموبايل" target="_blank">
			<img src="<?php bloginfo('url'); ?>/wp-content/plugins/mobile-boycott/logo.jpg" alt="صورة الحملة السورية لمقاطعة الموبايل"/>
		</a>
<?php
	}

// Delay plugin execution to ensure Dynamic Sidebar has a chance to load first
add_action('plugins_loaded', 'MobileBoycottWidgetInit');

?>
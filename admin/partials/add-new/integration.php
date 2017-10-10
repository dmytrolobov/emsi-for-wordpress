<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	/**
		* Shortcode
		*
		* @package     
		* @subpackage  Settings
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/	
	include ('settings/'.$m_current.'.php');	
?>



<div class="itembox">
	<div class="item-title">
		<h3>Available integrations</h3>
		<div class="wow-admin-col wow-wrap">
			<div class="wow-admin-col-12">
				<?php echo self::create_option($registration);?> <label for="wow_registration">Registration</label>
				<input type="hidden" name="ems_integration[registration]" value="">
			</div>
			<div class="wow-admin-col-12">
				<?php echo self::create_option($comment);?> <label for="wow_comment">Comment</label>
				<input type="hidden" name="ems_integration[comment]" value="">
			</div>
			<div class="wow-admin-col-12">
				<?php if (class_exists('Easy_Digital_Downloads') === true) { ;?>
				<?php echo self::create_option($edd);?> <label for="wow_edd">Easy Digital Downloads </label>
				<input type="hidden" name="ems_integration[edd]" value="">
				<?php } else { ;?>
					<input type="checkbox" disabled > <a href="https://wordpress.org/plugins/easy-digital-downloads/" target="_blank">Easy Digital Downloads</a> <i><small>(not installed)</small></i>
					<input type="hidden" name="ems_integration[edd]" value="">
				<?php } ;?>
			</div>
			
			<div class="wow-admin-col-12">
				<?php if (class_exists('WooCommerce') === true) { ;?>
				<?php echo self::create_option($woo);?> <label for="wow_woo">WooCommerce </label>
				<input type="hidden" name="ems_integration[woo]" value="">
				<?php } else { ;?>
					<input type="checkbox" disabled > <a href="https://wordpress.org/plugins/woocommerce/" target="_blank">WooCommerce</a> <i><small>(not installed)</small></i>	
					<input type="hidden" name="ems_integration[woo]" value="">
				<?php } ;?>
			</div>
			
			<div class="wow-admin-col-12">
				<?php if (class_exists('Wow_Forms_Class') === true) { ;?>
				<?php echo self::create_option($wow_forms);?> <label for="wow_wow_forms">Wow Forms </label>
				<input type="hidden" name="ems_integration[wow_forms]" value="">
				<?php } else { ;?>
					<input type="checkbox" disabled > <a href="https://wordpress.org/plugins/mwp-forms/" target="_blank">Wow Forms - create any form with custom style</a> <i><small>(not installed)</small></i>	
					<input type="hidden" name="ems_integration[wow_forms]" value="">
				<?php } ;?>
			</div>
			
			<div class="wow-admin-col-12">
				<?php if (class_exists('Users_Activity') === true) { ;?>
				<?php echo self::create_option($users_activity);?> <label for="wow_users_activity">Users Activity </label>
				<input type="hidden" name="ems_integration[users_activity]" value="">
				<?php } else { ;?>
					<input type="checkbox" disabled > <a href="https://wordpress.org/plugins/users-activity/" target="_blank">Users Activity - convert visitors to users</a> <i><small>(not installed)</small></i>	
					<input type="hidden" name="ems_integration[users_activity]" value="">
				<?php } ;?>
			</div>
			
		</div>
		
	</div>	
</div>


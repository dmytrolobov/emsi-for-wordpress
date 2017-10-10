<?php
	/**
		* Plugin Name:       Email Marketing Services Integration
		* Plugin URI:        
		* Description:       Easy Wordpress integration with email marketing services.
		* Version:           1.0
		* Author:            Dmytro Lobov		
		* License:           GPL-2.0+
		* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt		
		* Text Domain:       
		* Domain Path:       ems-integration
		*
		* Users Activity is free software: you can redistribute it and/or modify
		* it under the terms of the GNU General Public License as published by
		* the Free Software Foundation, either version 2 of the License, or
		* any later version.
		*
		* Users Activity is distributed in the hope that it will be useful,
		* but WITHOUT ANY WARRANTY; without even the implied warranty of
		* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
		* GNU General Public License for more details.
		*
		* You should have received a copy of the GNU General Public License
		* along with Easy Digital Downloads. If not, see <http://www.gnu.org/licenses/>.
		*
	*/	
	
	// Exit if accessed directly.
	if ( ! defined( 'ABSPATH' ) ) exit;	
	
	if( !class_exists( 'Wow_Company' )) {
		require_once plugin_dir_path( __FILE__ ) . 'asset/class-wow-company.php';				
	}
	
	// Uninstall plugin
	register_uninstall_hook( __FILE__, array( 'EMS_Integration', 'uninstall' ) );
	
	if( !class_exists( 'EMS_Integration' ) ) {
		final class EMS_Integration {
			
			private static $instance;
			
			const PREF = 'ems_integration';
			
			public static function uninstall() {
				delete_option( self::PREF );			
			}
			
			public static function instance() {
				
				if ( ! isset( self::$instance ) && ! ( self::$instance instanceof EMS_Integration ) ) {
					$arg = array(
						'plugin_name'      => 'EMS Integration',
						'plugin_menu'      => 'EMS Integration',
						'plugin_home_url'  => ' email-marketing-services-integration',
						'version'          => '1.0',
						'base_file'        => basename(__FILE__),
						'slug'             => dirname(plugin_basename(__FILE__)),
						'plugin_dir'       => plugin_dir_path( __FILE__ ),
						'plugin_url'       => plugin_dir_url( __FILE__ ),
						'pref'             => self::PREF,
						'shortcode'        => '',					
					);				
					self::$instance = new EMS_Integration;
					self::$instance->includes();
					self::$instance->adminlinks = new WOW_EMS_Integration_ADMIN_LINKS($arg);
					self::$instance->admin      = new WOW_EMS_Integration_ADMIN($arg);
					self::$instance->admin      = new EMSI_Interation($arg);					
				}
				return self::$instance;
			}
			
			public function __clone() {
				// Cloning instances of the class is forbidden.
				_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'ems-integration' ), '1.0' );
			}
			
			public function __wakeup() {
				// Unserializing instances of the class is forbidden.
				_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'ems-integration' ), '1.0' );
			}
			
			private function includes() {			
				require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-links.php';			
				require_once plugin_dir_path( __FILE__ ) . 'admin/class-admin.php';				
				require_once plugin_dir_path( __FILE__ ) . 'integrations/class-intagration.php';				
				require_once plugin_dir_path( __FILE__ ) . 'services/class-mailchimp.php';
				require_once plugin_dir_path( __FILE__ ) . 'services/class-getresponse.php';
				require_once plugin_dir_path( __FILE__ ) . 'services/class-activecampaign.php';	
				require_once plugin_dir_path( __FILE__ ) . 'services/class-aweber.php';
				require_once plugin_dir_path( __FILE__ ) . 'services/class-sendinblue.php';				
			}			
		}
	}
	
	function email_marketing_services_integration() {
		return EMS_Integration::instance();
	}	
	// Get Running.
email_marketing_services_integration();
<?php
	/**
		* Admin Pages
		*
		* @package     EMAIL_INTEGRATION
		* @subpackage  Admin
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	// Exit if accessed directly
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	class EMAIL_INTEGRATION_ADMIN{
		public function __construct() {			
			add_action( 'admin_menu', array($this, 'add_menu') );				
			add_filter( 'admin_footer_text', array($this, 'admin_footer_text') );
			// add_action( 'admin_enqueue_scripts', array($this, 'style_script') );
			// add_action( 'admin_init', array($this, 'update_option') );
			// add_action( 'admin_notices', array($this, 'admin_messages') );			
		}
		
		// Add admin pages
		public function add_menu() {
						
		}
		
		// Admin style
		public function style_script() {
			wp_enqueue_style( 'users-activity', USERS_ACTIVITY_PLUGIN_URL . 'asset/css/admin.css', array(), USERS_ACTIVITY_VERSION);							
		}		
		
		//Users page
		public function main_page() {
			global $ua_type;	
			$ua_type = true;			
			include_once( 'users/index.php' );	
			wp_enqueue_script( 'users-activity', USERS_ACTIVITY_PLUGIN_URL . 'asset/js/admin.js', array('jquery'), USERS_ACTIVITY_VERSION);
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script('wp-color-picker');
		}		
		
		//Settings page
		public function settings_page() {
			global $ua_type;	
			$ua_type = true;			
			include_once( 'settings/index.php' );
			wp_enqueue_script( 'users-activity', USERS_ACTIVITY_PLUGIN_URL . 'asset/js/admin.js', array('jquery'), USERS_ACTIVITY_VERSION);
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script('wp-color-picker');
		}		
				
		public function get_more() {
			global $ua_type;	
			$ua_type = true;			
			include_once( 'more/index.php' );
			wp_enqueue_style( 'ua-wow-style', USERS_ACTIVITY_PLUGIN_URL . 'asset/css/wow-style.css', array(), USERS_ACTIVITY_VERSION);
		}		
				
		public function ua_settings_get_tabs() {	
			global $ua_extensions;
			
			$tabs             = array();
			$tabs['general']  = __( 'General', 'users-activity' );			
			$tabs['emails']   = __( 'Emails', 'users-activity' );
			
			
			if( ! empty( $ua_extensions ) ) {
				$tabs['extensions'] = __( 'Extensions', 'users-activity' );
			}
			
			
			return apply_filters( 'ua_settings_tabs', $tabs );
		}
		
		function ua_get_settings_tab_sections( $tab = false ) {
			
			$tabs     = false;
			$sections = self::ua_get_registered_settings_sections();
			
			if( $tab && ! empty( $sections[ $tab ] ) ) {
				$tabs = $sections[ $tab ];
				} else if ( $tab ) {
				$tabs = false;
			}
			
			return $tabs;
		}
		
		function ua_get_registered_settings_sections() {
			
			static $sections = false;
			
			if ( false !== $sections ) {
				return $sections;
			}
			
			$sections = array(
				'general'    => apply_filters( 'ua_settings_sections_general', array(
					'main'               => __( 'General Settings', 'users-activity' ),
					'registration'       => __( 'Registration', 'users-activity' ),					
					) 
				),				
				'emails'     => apply_filters( 'ua_settings_sections_emails', array(
					'main'               => __( 'Email Settings', 'users-activity' ),
					'registration'       => __( 'Registration Email', 'users-activity' ),
					'notification'       => __( 'New User Notifications', 'users-activity' ),
					) 
				),			
				'extensions' => apply_filters( 'ua_settings_sections_extensions', array(					
					) 
				),
			
			);
			
			$sections = apply_filters( 'ua_settings_sections', $sections );
			
			return $sections;
		}
		
		
		
		// Update an option
		public function update_option(){			
			if ( !empty($_POST['ua_nonce_field']) && wp_verify_nonce($_POST['ua_nonce_field'],'update_ua_options') ){
				$new_option = wp_unslash($_POST['ua_options']);				
				$options = get_option( 'ua_options' );
				if (empty($options)){
					$result = $new_option;
				}
				else {					
					$result = array_merge($options, $new_option);					
				}				
				update_option( 'ua_options', $result );				
				$reffer = $_POST['_wp_http_referer'];
				$url = add_query_arg( array('ua-message' => 'update'), $reffer );
				wp_redirect($url);
				exit;					
			}			
		}
		
		// Admin Messages
		public function admin_messages(){			
			if ( isset( $_GET['ua-message'] ) && 'update' == $_GET['ua-message']) {				
				add_settings_error( 'ua-notices', 'ua-option-update', __( 'Settings updated.', 'users-activity' ), 'updated' );
			}
			if ( isset( $_GET['ua-message'] ) && 'user-activity' == $_GET['ua-message']) {				
				add_settings_error( 'ua-notices', 'ua-user-activity', __( 'No yet activity for user. Please, import activity for user.', 'users-activity' ), 'error' );
			}
			settings_errors( 'ua-notices' );
		}
		
		// Footer message
		public function admin_footer_text( $footer_text ) {
			global $ua_type;			
			if ( $ua_type == true ) {
				$rate_text = sprintf( __( 'Thank you for using <a href="%1$s" target="_blank">Email Integration</a>! Please <a href="%2$s" target="_blank">rate us</a> on <a href="%2$s" target="_blank">WordPress.org</a>', 'users-activity' ),
				'https://wordpress.org/support/view/plugin-reviews/users-activity',
				'https://wordpress.org/support/view/plugin-reviews/users-activity?filter=5#postform'
				);				
				return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
				} else {
				return $footer_text;
			}
		}
	}									
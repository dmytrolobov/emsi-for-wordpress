<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Class for admin links
		*
		* @package     WOW_EMS_Integration_ADMIN_LINKS
		* @subpackage  
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	class WOW_EMS_Integration_ADMIN_LINKS {
		
		private $arg;		
		
		public function __construct( $arg) {
			$this->base_file  = $arg['base_file'];
			$this->plugin_dir = $arg['plugin_dir'];
			$this->slug       = $arg['slug'];			
			
			// admin links
			add_filter( 'plugin_row_meta', array($this, 'row_meta'), 10, 4 );
			add_filter( 'plugin_action_links', array($this, 'action_links'), 10, 2 );			
					
		}				
		
		// Admin links
		public function row_meta( $meta, $plugin_file ){
			if( false === strpos( $plugin_file, $this->base_file ) )
			return $meta;
			$meta[] = '<a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a>';
			return $meta;
		}
		
		public function action_links( $actions, $plugin_file ){
			if( false === strpos( $plugin_file, $this->base_file ) )
			return $actions;
			$settings_link = '<a href="admin.php?page='. $this->slug .'">Settings</a>'; 
			array_unshift( $actions, $settings_link ); 
			return $actions; 
		}	
	}			
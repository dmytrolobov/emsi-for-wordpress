<?php
	/**
		* Interation Class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	class EMSI_Interation {
		
		private $arg;
		
		function __construct( $arg ) {	
			$this->plugin_url = $arg['plugin_url'];			
			$ems_option = get_option('ems_integration');			
			$this->option = $ems_option;
			
			add_action( 'ems_integration', array( $this, 'subscribe' ), 10, 1 );
			
			// Registration
			if(!empty($ems_option['registration'])){
				add_action( 'user_register', array( $this, 'subscribe_from_registration' ), 90, 1 );				
			}
			
			// Comment
			if(!empty($ems_option['comment'])){
				add_action( 'comment_post', array( $this, 'subscribe_from_comment' ), 40, 3 );						
			}
			
			// Easy Digital Downloads
			if(!empty($ems_option['edd'])){
				add_action( 'edd_complete_purchase', array( $this, 'subscribe_from_edd'), 50 );
			}
			
			// WooCommerce
			if(!empty($ems_option['woo'])){				
				add_action( 'woocommerce_checkout_order_processed', array( $this, 'subscribe_from_woocommerce' ) );
			}		
			
				
			// Users Activity
			if(!empty($ems_option['users_activity'])){				
				add_action( 'ua_integration_servises', array( $this, 'subscribe_from_users_activity' ));
			}	
		}	
		public function subscribe( $data ) {			
			include('integration.php');
		}
		
		public function subscribe_from_registration( $user_id ) {
			include ('registration.php');			
		}
		
		public function subscribe_from_comment( $comment_ID, $comment_approved = '', $commentdata ) {
			include ('comment.php');			
		}
		
		public function subscribe_from_edd( $payment_id ) {
			include ('easydigitaldownloads.php');
		}
		
		public function subscribe_from_woocommerce( $order_id ) {			
			include ('woocommerce.php');
		}		
		public function subscribe_from_users_activity ($userdata) {
			include ('users_activity.php');
		}		
		
	}
?>
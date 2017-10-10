<?php
	/**
		* MailChimp class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	class EMSI_MailChimp {		
		
		public function subscribe($userdata) {
			$option = get_option('ems_integration');
			
			if( empty( $option['mailchimp'] ) ) {
				return false;
			}			
			
			if( empty( $option['mailchimp_api'] ) ) {
				return false;
			}	
			
			$list_id = ! empty( $option['mailchimp_list_id'] ) ? $option['mailchimp_list_id'] : false;
			if( ! $list_id ) {
				return false;
			}
			
			$api_key = $option['mailchimp_api'];			
			$api_endpoint = 'https://<dc>.api.mailchimp.com/2.0/';			
			list(, $datacentre) = explode( '-', $api_key );			
			$api_endpoint = str_replace( '<dc>', $datacentre, $api_endpoint );						
			$merge_vars = array( 'FNAME' => $userdata['NAME'], 'LNAME' => $userdata['LNAME'] );		
			$result = $this->call('lists/subscribe', array(
				'id'                => $list_id,
				'email'             => array( 'email' => $userdata['EMAIL'] ),
				'merge_vars'        => $merge_vars,
				'double_optin'      => false,
				'update_existing'   => true,
				'replace_interests' => false,
				'send_welcome'      => false,
				)
			);
			
			if( $result ) {
				return true;
			}
			return false;		
		}
		
		
		public function call( $method, $args = array() ) {
			return $this->_raw_request( $method, $args);
		}
				
		private function _raw_request( $method, $args = array() ) {  
			$option = get_option('ua_options');
			$api_key = $option['mailchimp_api'];
			$api_endpoint = 'https://<dc>.api.mailchimp.com/2.0/';		
			list(, $datacentre) = explode( '-', $api_key );
			$api_endpoint = str_replace( '<dc>', $datacentre, $api_endpoint );			
			$args['apikey'] = $api_key;			
			$url = $api_endpoint.'/'.$method.'.json';			
			$request_args = array(
				'method'      => 'POST',
				'timeout'     => 20,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking'    => true,
				'headers'     => array(
					'content-type' => 'application/json'
				),
				'body'        => json_encode( $args ),
			);
			
			$request = wp_remote_post( $url, $request_args );
			
			return is_wp_error( $request ) ? false : json_decode( wp_remote_retrieve_body( $request ) );
			
		}
		
	}	
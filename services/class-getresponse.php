<?php
	/**
		* Getresponse class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	class EMSI_Getresponse {		
		
		public function subscribe($userdata) {
			$option = get_option('ems_integration');
			
			if( empty( $option['getresponse'] ) ) {
				return false;
			}			
			
			if( empty( $option['getresponse_api'] ) ) {
				return false;
			}
			
			if( empty( $option['getresponse_list_id'] ) ) {
				return false;
			}				
			
			$api_key = $option['getresponse_api'];			
			$token = $option['getresponse_list_id'];			
			$data = array(		
			'email' => $userdata['EMAIL'],
			'name' => $userdata['NAME'].' '.$userdata['LNAME'],			
			'campaign'  => array(
				'campaignId' => $token
				)
			);
			$json_data = json_encode($data);
			$url = 'https://api.getresponse.com/v3/contacts';
			$args = array(
				'method'       => 'POST',			
				'headers'      => array(
					'Content-type' => 'application/json',
					'X-Auth-Token' => 'api-key '.$api_key
				),
				'body' => $json_data
			);
			$response = wp_remote_post( $url, $args );	
			$result = json_decode( $response['body'] );
			
			if( $result ) {
				return true;
			}
			return false;		
		}			
	}		
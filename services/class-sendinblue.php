<?php
	/**
		* Sendinblue class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	class EMSI_Sendinblue {		
		
		public function subscribe($userdata) {
			$option = get_option('ems_integration');
			
			if( empty( $option['sendinblue'] ) ) {
				return false;
			}
			
			if( empty( $option['sendinblue_api'] ) ) {
				return false;
			}
			
			if( empty( $option['sendinblue_list_id'] ) ) {
				return false;
			}			
			
			$api_key = $option['sendinblue_api'];			
			$list_id = $option['sendinblue_list_id'];			
			$data = array(		
				'email' => $userdata['EMAIL'],
				'attributes' => array(
					'fist name' => $userdata['NAME'],
					'last name' => $userdata['LNAME'],
				),
				'listid' => $list_id,			
			);
			
			$json_data = json_encode($data);
			$url = 'https://api.sendinblue.com/v2.0/user/createdituser';
			$args = array(
				'method'  => 'POST',			
				'headers' => array(
					'Content-type' => 'application/json',
					'api-key'      => $api_key,
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
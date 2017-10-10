<?php
	/**
		* Activecampaign class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	class EMSI_Activecampaign {		
		
		public function subscribe($userdata) {
		
			$option = get_option('ems_integration');
			
			if( empty( $option['activecampaign'] ) ) {
				return false;
			}			
			
			if( empty( $option['activecampaign_api'] ) ) {
				return false;
			}
			
			if( empty( $option['activecampaign_api_url'] ) ) {
				return false;
			}
			
			if( empty( $option['activecampaign_list_id'] ) ) {
				return false;
			}			
			
			$apiKey = $option['activecampaign_api'];
			
			$apiUrl = $option['activecampaign_api_url'];
			
			$list_id = $option['activecampaign_list_id'];
			
			$data = array(		
				'email'                           => $userdata['EMAIL'],
				'first_name'                      => $userdata['NAME'],
				'last_name'                       => $userdata['LNAME'],
				'p['.$list_id.']'                 => $list_id,
				'status['.$list_id.']'            => 1,
				'instantresponders['.$list_id.']' => 1,			
			);	
			
			$isPost = 'POST';
			
			$caller = $isPost ? 'wp_remote_post' : 'wp_remote_get';
			
			$postData = array();
			
			$getData = array(
				'api_key'    => $apiKey,
				'api_action' => 'contact_add',
				'api_output' => 'json'
			);
			
			$query = '';
			$strPostData = '';
            
			if ( $isPost ) {
				$postData = array_merge($postData, $data);
				} else {
				$getData = array_merge($getData, $data);
			}
			
			foreach( $getData as $key => $value ) $query .= $key . '=' . urlencode($value) . '&';
			$query = rtrim($query, '& ');
			
			foreach( $postData as $key => $value ) $strPostData .= $key . '=' . urlencode($value) . '&';
			$strPostData = rtrim($strPostData, '& ');
			
			$apiUrl = rtrim($apiUrl, '/ ');
			$url = $apiUrl . '/admin/api.php?' . $query;
            
			$args = array();
			if ( !empty( $strPostData ) ) $args['body'] = $strPostData;
			
			$response = $caller($url, $args);
			$result = json_decode($result['body'], true);        
			
			if( $result ) {
				return true;
			}
			return false;		
		}	
		
	}				
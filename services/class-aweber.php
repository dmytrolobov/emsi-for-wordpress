<?php
	/**
		* AWeber class
		*
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	class EMSI_AWeber {		
		
		public function subscribe($userdata) {
			$option = get_option('ems_integration');
			
			if( empty( $option['aweber'] ) ) {
				return false;
			}
			
			if( empty( $option['aweber_code'] ) ) {
				return false;
			}		
			
			$list_id = ! empty( $option['aweber_list_id'] ) ? $option['aweber_list_id'] : false;
			if( ! $list_id ) {
				return false;
			}
			
			$authorization_code = isset( $option['aweber_code'] ) ? trim( $option['aweber_code'] ) : '';
			
			if ( strlen( $authorization_code ) > 0 ) {
				
				if( ! class_exists( 'AWeberAPI' ) ) {
					require_once( plugin_dir_path( __FILE__ ) . '/aweber/aweber_api.php' );
				}
				
				$aweber = $this->get_authenticated_instance();
				
				if ( ! is_object( $aweber ) || false === ( $secrets = get_option( 'aweber_secrets' ) ) ) {
					return false;
				}
				
				try {
					$account = $aweber->getAccount( $secrets['access_key'], $secrets['access_secret'] );
					$subs = $account->loadFromUrl('/accounts/' . $account->id . '/lists/' . $list_id . '/subscribers');
					return $subs->create(array(
					'email' => $userdata['EMAIL'],
					'ip_address' => '',
					'name' => $userdata['NAME'] . ' ' . $userdata['LNAME'],
					'ad_tracking' => 'EMS_Integration',
					));
					
					return true;					
					} catch ( AWeberAPIException $exc ) {
					return false;
				}				
			}			
			return false;			
		}
		
		public function get_authenticated_instance() {
			$option = get_option('ems_integration');
			
			$authorization_code = isset( $option['aweber_code'] ) ? trim( $option['aweber_code'] ) : '';
			
			$msg = '';
			if ( ! empty( $authorization_code ) ) {
				
				if( ! class_exists( 'AWeberAPI' ) ) {
					require_once( plugin_dir_path( __FILE__ ). '/aweber/aweber_api.php' );
				}
				
				$error_code = "";
				
				if ( false !== get_option( 'aweber_secrets' ) ) {
					$options = get_option( 'aweber_secrets' );
					$msg = $options;
					try {
						$api = new AWeberAPI( $options['consumer_key'], $options['consumer_secret'] );
						} catch( AWeberAPIException $exc ) {
						$api = false;
					}
					return $api;
					} else {
					try {
						list( $consumer_key, $consumer_secret, $access_key, $access_secret ) = AWeberAPI::getDataFromAweberID( $authorization_code );
						} catch (AWeberAPIException $exc) {
						list( $consumer_key, $consumer_secret, $access_key, $access_secret ) = null;
						# make error messages customer friendly.
						$descr = $exc->message;
						$descr = preg_replace( '/http.*$/i', '', $descr );     # strip labs.aweber.com documentation url from error message
						$descr = preg_replace( '/[\.\!:]+.*$/i', '', $descr ); # strip anything following a . : or ! character
						$error_code = " ($descr)";
						} catch ( AWeberOAuthDataMissing $exc ) {
						list( $consumer_key, $consumer_secret, $access_key, $access_secret ) = null;
						} catch ( AWeberException $exc ) {
						list( $consumer_key, $consumer_secret, $access_key, $access_secret ) = null;
					}
					
					if ( ! $access_secret ) {
						$msg =  '<div id="aweber_access_token_failed" class="error">';
						$msg .= "Unable to connect to your AWeber Account$error_code:<br />";
						
						# show oauth_id if it failed and an api exception was not raised
						if ( empty( $error_code ) ) {
							$msg .= "Authorization code entered was: $authorization_code <br />";
						}
						
						$msg .= "Please make sure you entered the complete authorization code and try again.</div>";
						
						} else {
						$secrets = array(
							'consumer_key'    => $consumer_key,
							'consumer_secret' => $consumer_secret,
							'access_key'      => $access_key,
							'access_secret'   => $access_secret,
						);
						
						update_option( 'aweber_secrets', $secrets );
					}
				}
				} else {
				delete_option( 'aweber_secrets' );
			}
			
			$msg = isset( $msg ) ? $msg : $pluginAdminOptions;
			
			update_option( 'aweber_response', $msg );
			
		}
		
	}			
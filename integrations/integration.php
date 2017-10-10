<?php
	/**
		* Integration
		*
		* @package     
		* @subpackage  Integration with serveses
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	if ( ! defined( 'ABSPATH' ) ) exit;	
	
	if( !empty( $this->option['mailchimp'] ) ) {
		$mailchimp = new EMSI_MailChimp ();
		$result = $mailchimp->subscribe($data);
	}		
	if( !empty( $this->option['getresponse'] ) ) {
		$getresponse = new EMSI_Getresponse ();
		$result = $getresponse->subscribe($data);
	}		
	if( !empty( $this->option['activecampaign'] ) ) {
		$activecampaign = new EMSI_Activecampaign ();
		$result = $activecampaign->subscribe($data);
	}	
	if( !empty( $this->option['aweber'] ) ) {
		$aweber = new EMSI_AWeber ();
		$result = $aweber->subscribe($data);
	}	
	if( !empty( $this->option['sendinblue'] ) ) {
		$sendinblue = new EMSI_Sendinblue ();
		$result = $sendinblue->subscribe($data);
	}
	
	
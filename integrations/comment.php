<?php
	/**
		* Integration
		*
		* @package     
		* @subpackage  Comment
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	if ( ! defined( 'ABSPATH' ) ) exit;
	
	if ( $comment_approved === 'spam' ) {
		return false;
	}	
	$data = array(
		'EMAIL'    => $commentdata['comment_author_email'],
		'NAME'     => $commentdata['comment_author'],
		'LNAME'    => '',
		'OPTIN_IP' => $commentdata['comment_author_IP'],		
	);
	
	include('integration.php');
	
?>
<?php
/**
* Widget Settings
*
* @package     
* @subpackage  Settings
* @copyright   Copyright (c) 2017, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

$mailchimp = array(
	'id'   => 'mailchimp',
	'name' => 'mailchimp',	
	'type' => 'checkbox',
	'func' => 'mailchimp',
	'val' => isset($param['mailchimp']) ? $param['mailchimp'] : 0,	
);

$mailchimp_api = array(
	'id'   => 'mailchimp_api',
	'name' => 'mailchimp_api',	
	'type' => 'text',
	'val' => isset($param['mailchimp_api']) ? $param['mailchimp_api'] : '',	
);

$mailchimp_list_id = array(
	'id'   => 'mailchimp_list_id',
	'name' => 'mailchimp_list_id',	
	'type' => 'text',
	'val' => isset($param['mailchimp_list_id']) ? $param['mailchimp_list_id'] : '',	
);

$mailchimp_optin = array(
	'id'   => 'mailchimp_optin',
	'name' => 'mailchimp_optin',	
	'type' => 'select',
	'val' => isset($param['mailchimp_optin']) ? $param['mailchimp_optin'] : '',	
	'option' => array(
		'1' => 'Single Opt-In',
		'2' => 'Double Opt-In'	
	),
);

$getresponse = array(
	'id'   => 'getresponse',
	'name' => 'getresponse',	
	'type' => 'checkbox',
	'func' => 'getresponse',
	'val' => isset($param['getresponse']) ? $param['getresponse'] : 0,	
);

$getresponse_api = array(
	'id'   => 'getresponse_api',
	'name' => 'getresponse_api',	
	'type' => 'text',
	'val' => isset($param['getresponse_api']) ? $param['getresponse_api'] : '',	
);

$getresponse_list_id = array(
	'id'   => 'getresponse_list_id',
	'name' => 'getresponse_list_id',	
	'type' => 'text',
	'val' => isset($param['getresponse_list_id']) ? $param['getresponse_list_id'] : '',	
);


$activecampaign = array(
	'id'   => 'activecampaign',
	'name' => 'activecampaign',	
	'type' => 'checkbox',
	'func' => 'activecampaign',
	'val' => isset($param['activecampaign']) ? $param['activecampaign'] : 0,	
);


$activecampaign_api = array(
	'id'   => 'activecampaign_api',
	'name' => 'activecampaign_api',	
	'type' => 'text',
	'val' => isset($param['activecampaign_api']) ? $param['activecampaign_api'] : '',	
);

$activecampaign_api_url = array(
	'id'   => 'activecampaign_api_url',
	'name' => 'activecampaign_api_url',	
	'type' => 'text',
	'val' => isset($param['activecampaign_api_url']) ? $param['activecampaign_api_url'] : '',	
);

$activecampaign_list_id = array(
	'id'   => 'activecampaign_list_id',
	'name' => 'activecampaign_list_id',	
	'type' => 'text',
	'val' => isset($param['activecampaign_list_id']) ? $param['activecampaign_list_id'] : '',	
);


$aweber = array(
	'id'   => 'aweber',
	'name' => 'aweber',	
	'type' => 'checkbox',
	'func' => 'aweber',
	'val' => isset($param['aweber']) ? $param['aweber'] : 0,	
);

$aweber_code = array(
	'id'   => 'aweber_code',
	'name' => 'aweber_code',	
	'type' => 'text',
	'val' => isset($param['aweber_code']) ? $param['aweber_code'] : '',	
);

$aweber_list_id = array(
	'id'   => 'aweber_list_id',
	'name' => 'aweber_list_id',	
	'type' => 'text',
	'val' => isset($param['aweber_list_id']) ? $param['aweber_list_id'] : '',	
);


$sendinblue = array(
	'id'   => 'sendinblue',
	'name' => 'sendinblue',	
	'type' => 'checkbox',
	'func' => 'sendinblue',
	'val' => isset($param['sendinblue']) ? $param['sendinblue'] : 0,	
);

$sendinblue_api = array(
	'id'   => 'sendinblue_api',
	'name' => 'sendinblue_api',	
	'type' => 'text',
	'val' => isset($param['sendinblue_api']) ? $param['sendinblue_api'] : '',	
);

$sendinblue_list_id = array(
	'id'   => 'sendinblue_list_id',
	'name' => 'sendinblue_list_id',	
	'type' => 'text',
	'val' => isset($param['sendinblue_list_id']) ? $param['sendinblue_list_id'] : '',	
);

?>
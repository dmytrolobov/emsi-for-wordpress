<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Integration settings
*
* @package     
* @subpackage  Add New
* @copyright   Copyright (c) 2017, Dmytro Lobov
* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
* @since       1.0
*/

$registration = array(
	'id'   => 'registration',
	'name' => 'registration',	
	'type' => 'checkbox',
	'val' => isset($param['registration']) ? $param['registration'] : 0,	
);

$comment = array(
	'id'   => 'comment',
	'name' => 'comment',	
	'type' => 'checkbox',
	'val' => isset($param['comment']) ? $param['comment'] : 0,	
);

$edd = array(
	'id'   => 'edd',
	'name' => 'edd',	
	'type' => 'checkbox',
	'val' => isset($param['edd']) ? $param['edd'] : 0,	
);

$woo = array(
	'id'   => 'woo',
	'name' => 'woo',	
	'type' => 'checkbox',
	'val' => isset($param['woo']) ? $param['woo'] : 0,	
);

$wow_forms = array(
	'id'   => 'wow_forms',
	'name' => 'wow_forms',	
	'type' => 'checkbox',
	'val' => isset($param['wow_forms']) ? $param['wow_forms'] : 0,	
);

$users_activity = array(
	'id'   => 'users_activity',
	'name' => 'users_activity',	
	'type' => 'checkbox',
	'val' => isset($param['users_activity']) ? $param['users_activity'] : 0,	
);

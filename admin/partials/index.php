<?php if ( ! defined( 'ABSPATH' ) ) exit;
	/**
		* Admin Pages Index
		*
		* @package     
		* @subpackage  
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
?>
<div class="wow">
	<span class="wow-plugin-title"><?php echo $this->plugin_name; ?></span> <span class="wow-plugin-version">(version <?php echo $this->version; ?>)</span> 
	<?php
		$current = (isset($_GET['tab'])) ? sanitize_text_field($_GET['tab']) : 'settings';	
		$tabs = array(
			'settings' => array('Settings','fa-cogs'), 			 
			'discount' => array('Discount','fa-percent'),
			'support'  => array('Support','fa-life-ring'),
			'facebook' => array('Join Us','fa-facebook')
			); 				
		echo '<ul class="wow-admin-menu">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? 'active' : '';
			$tab = $tab;
			echo "<li><a class='$class' href='?page=".$this->slug."&tab=$tab'>".$name[0]." <i class='fa ".$name[1]."'></i></a></li> ";		
		}
		echo '</ul>';		
	?>
	<?php include_once ($current.'.php'); ?>
</div>
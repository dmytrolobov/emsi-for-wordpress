<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<div class="wow">
	<span class="wow-plugin-title"><?php echo $this->name; ?></span>  <span class="wow-plugin-version">(Make Your Website Legendary)</span> 
	
	<?php
		$current = (isset($_GET['tab'])) ? sanitize_text_field($_GET['tab']) : 'discount';	
		$tabs = array('discount' => array('Discount', 'fa-percent'), 'items' => array('Items','fa-plug'), 'facebook' => array('Join Us ','fa-facebook') ); 				
		echo '<ul class="wow-admin-menu">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? 'active' : '';
			echo "<li><a class='$class' href='?page=wow-company&tab=$tab'>$name[0] <i class='fa $name[1]'></i></a></li> ";		
		}
		echo '</ul>';
		
	?>
	
	
	<?php include_once ($current.'.php'); ?>
	
</div>

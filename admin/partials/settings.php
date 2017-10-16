<?php if ( ! defined( 'ABSPATH' ) ) exit;		
	$tab_menu = array(
		'integration'  => 'fa-handshake-o',
		'services'     => 'fa-envelope-o',		
	);		
	$param = get_option($this->pref);
?>
<form action="" method="post" name="<?php echo $this->pref;?>" id="ems_integration">
	<div class="wowcolom">
		<div id="wow-leftcol">			
			<div class="menu-box wow-admin">
				<ul class="menu-nav">
					<?php 						
						$m_current = (isset($_GET['menu'])) ? sanitize_text_field($_GET['menu']) : 'integration';
						foreach ($tab_menu as $menu => $icon){
							$m_class = ( $menu == $m_current ) ? 'active' : '';							
							echo '<li><a class="'.$m_class.'" href="?page='.$this->slug.'&tab='.$current.'&menu='.$menu.'"><i class="fa '.$icon.'"></i> '.ucfirst($menu).'</a></li>';
						}						
					?>
				</ul>
				<div class="menu-panels">					
					<?php include_once ('add-new/'.$m_current.'.php'); ?>					
				</div>
			</div>			
		</div>
		<div id="wow-rightcol">
			<div class="wowbox">
				<h3>Publish</h3>
				<div class="wow-admin" style="display: block;">
					<div class="wow-admin-col">						
						<div class="wow-admin-col-12 right">							
							<?php submit_button(); ?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="wowbox">
				<center><img src="<?php echo plugin_dir_url( __FILE__ ); ?>thankyou.png" alt=""  /></center>
				<hr/>
				<div class="wow-admin wow-plugins">
					<p>We will be very grateful if you <a href="https://wordpress.org/plugins/email-marketing-services-integration" target="_blank">leave a review</a> on the work of the plugin.</p>
					<p>If you have suggestions on how to improve the plugin or create a new plug-in, write to us via the <a href='admin.php?page=<?php echo $this->slug;?>&tab=support' title="Support page">support form</a>.</p>
					<p>We really appreciate your reviews and suggestions for improving the plugin.</p>
					<p>					
					*****************<br/>
					<em><b>Best Regards</b>,<br/>						
						<a href="https://wow-estore.com/" target="_blank">Wow-Company Team</a><br/>
						Dmytro Lobov<br/>
						<a href="mailto:support@wow-company.com">support@wow-company.com</a>
					</em>
				</div>
			</div>		
			
		</div>
	</div>			
	<?php wp_nonce_field('wow_'.$this->pref.'_update','wow_'.$this->pref.'_nonce_field'); ?>
</form>	
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
				<h3><i class="fa fa-star" style="color:#ffd400"></i> Review </h3>
				<div class="wow-admin wow-plugins">
					<p><a href="https://wordpress.org/plugins/<?php echo $this->plugin_home_url; ?>" target="_blank">Leave your rating and review</a> on the work of the plugin and get a 30% discount on all plugins on site https://wow-estore.com. <a href="admin.php?page=<?php echo $this->slug;?>&tab=discount">More information</a> <br/><br/>
						<em>Best Regards,<br/>
							<a href="https://wow-estore.com/" target="_blank">Wow-Company Team</a><br/>
						<a href="mailto:support@wow-company.com">support@wow-company.com</a></em>
					</p>					
				</div>
			</div>
		</div>
	</div>			
	<?php wp_nonce_field('wow_'.$this->pref.'_update','wow_'.$this->pref.'_nonce_field'); ?>
</form>	
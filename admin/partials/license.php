<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>		
<form method="post" action="options.php">
	<?php settings_fields('wow_license_'.$this->pref); ?>
	<div class="wowbox" style="width:30%;"> 
		<div class="wow-admin">
			<div class="wow-admin-col-12">
				<input id="wow_license_key_<?php echo $this->pref;?>" name="wow_license_key_<?php echo $this->pref;?>" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" placeholder="Enter your license key" />
			</div>
			<?php if( false !== $license ) { ?>
				<?php if( $status !== false && $status == 'valid' ) { ?>
					<div class="wow-admin-col-12">	
						<b>Plugin Status</b>: <span style="color:green;"><?php _e('Active'); ?></span>							
					</div>		
					<div class="wow-admin-col-12">
						<?php wp_nonce_field( 'wow_nonce_'.$this->pref, 'wow_nonce_'.$this->pref ); ?>
						<input type="submit" class="button-secondary" name="wow_license_deactivate_<?php echo $this->pref;?>" value="Deactivate License"/>
					</div>
					<div class="wow-admin-col-12">
						Your license key expires on <?php echo date_i18n( get_option( 'date_format' ), strtotime( get_option( 'wow_license_expire_'.$this->pref ), current_time( 'timestamp' ) ) ); ?>
					</div>
					<?php } else {
					wp_nonce_field( 'wow_nonce_'.$this->pref, 'wow_nonce_'.$this->pref ); ?>
					<div class="wow-admin-col-12">	
						<b>Plugin Status</b>: <span style="color:red;"><?php _e('Inactive'); ?></span>							
					</div>
					<div class="wow-admin-col-12">	
						<input type="submit" class="button-secondary" name="wow_license_activate_<?php echo $this->pref;?>" value="Activate License"/>
					</div>
					<div class="wow-admin-col-12" style="font-size:10px;font-style:italic;color:green;">
						Click the button 'Activate License' to activate the plugin
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
	<?php submit_button(); ?>
</form>
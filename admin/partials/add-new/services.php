<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	/**
		* Services
		*
		* @package     
		* @subpackage  Settings
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	
	include ('settings/'.$m_current.'.php');
	
	
?>


<div class="itembox">
	<div class="item-title">
		<h3>Email Marketing Services</h3>		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<?php echo self::create_option($mailchimp);?> <label for="wow_mailchimp">MailChimp</label>
				<input type="hidden" name="ems_integration[mailchimp]" value="">								
			</div>			
		</div>
		
		<div class="wow-admin-col" id="mailchimp">
			<div class="wow-admin-col-6">
				MailChimp api:<br/>
				<?php echo self::create_option($mailchimp_api);?>
				<i><a href="https://kb.mailchimp.com/integrations/api-integrations/about-api-keys" target="_blank">Get Api</a></i>
			</div>	
			<div class="wow-admin-col-6">
				MailChimp list id:<br/>
				<?php echo self::create_option($mailchimp_list_id);?>
				<i><a href="https://kb.mailchimp.com/lists/manage-contacts/find-your-list-id" target="_blank">Get list id</a></i>
			</div>			
		</div>
		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<?php echo self::create_option($getresponse);?> <label for="wow_getresponse">Getresponse</label>
				<input type="hidden" name="ems_integration[getresponse]" value="">								
			</div>			
		</div>
		
		<div class="wow-admin-col" id="getresponse">
			<div class="wow-admin-col-6">
				Getresponse api:<br/>
				<?php echo self::create_option($getresponse_api);?><br/>
				<i><a href="https://app.getresponse.com/manage_api.html" target="_blank">Get Api</a></i>
			</div>	
			<div class="wow-admin-col-6">
				Getresponse token:<br/>
				<?php echo self::create_option($getresponse_list_id);?><br/>
				<i><a href="https://app.getresponse.com/campaign_list.html" target="_blank">Get token</a></i>
			</div>
		</div>
		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<?php echo self::create_option($activecampaign);?> <label for="wow_activecampaign">Activecampaign</label>
				<input type="hidden" name="ems_integration[activecampaign]" value="">								
			</div>			
		</div>
		
		<div class="wow-admin-col" id="activecampaign">
			<div class="wow-admin-col-4">
				Activecampaign api:<br/>
				<?php echo self::create_option($activecampaign_api);?><br/>
				<i><a href="https://help.activecampaign.com/hc/en-us/articles/207317590-Getting-started-with-the-API" target="_blank">Get Api</a></i>
			</div>				
			<div class="wow-admin-col-4">
				Activecampaign api url:<br/>
				<?php echo self::create_option($activecampaign_api_url);?><br/>
				<i><a href="https://help.activecampaign.com/hc/en-us/articles/207317590-Getting-started-with-the-API" target="_blank">Get api url</a></i>
			</div>		
			<div class="wow-admin-col-4">
				Activecampaign list id:<br/>
				<?php echo self::create_option($activecampaign_list_id);?><br/>
				<i><a href="https://community.activecampaign.com/t/how-to-discover-a-list-id/1846/2" target="_blank">Get list id</a></i>
			</div>
		</div>
		
		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<?php echo self::create_option($aweber);?> <label for="wow_aweber">Aweber</label>
				<input type="hidden" name="ems_integration[aweber]" value="">								
			</div>			
		</div>
		
		<div class="wow-admin-col" id="aweber">
			<div class="wow-admin-col-6">
				Authorization Code:<br/>
				<?php echo self::create_option($aweber_code);?><br/>
				<i><a href="https://auth.aweber.com/1.0/oauth/authorize_app/7bbe5520" target="_blank">Get Authorization Code</a></i>
			</div>	
			<div class="wow-admin-col-6">
				Aweber list id:<br/>
				<?php echo self::create_option($aweber_list_id);?><br/>
				<i><a href="https://help.aweber.com/hc/en-us/articles/204028426-What-Is-The-Unique-List-ID-" target="_blank">Get list id</a></i>
			</div>
		</div>
		
		<div class="wow-admin-col">
			<div class="wow-admin-col-12">
				<?php echo self::create_option($sendinblue);?> <label for="wow_sendinblue">Sendinblue</label>
				<input type="hidden" name="ems_integration[sendinblue]" value="">								
			</div>			
		</div>
		
		<div class="wow-admin-col" id="sendinblue">
			<div class="wow-admin-col-6">
				Sendinblue api:<br/>
				<?php echo self::create_option($sendinblue_api);?><br/>
				<i><a href="https://my.sendinblue.com/advanced/apikey" target="_blank">Get Api Version 2.0</a></i>
			</div>	
			<div class="wow-admin-col-6">
				Sendinblue list id:<br/>
				<?php echo self::create_option($sendinblue_list_id);?><br/>				
			</div>
		</div>
		
		
	</div>	
</div>


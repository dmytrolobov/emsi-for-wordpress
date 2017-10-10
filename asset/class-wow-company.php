<?php if ( ! defined( 'ABSPATH' ) ) exit; 
	/**
		* Wow Company Class
		*
		* @package     
		* @subpackage  
		* @copyright   Copyright (c) 2017, Dmytro Lobov
		* @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
		* @since       1.0
	*/
	final class Wow_Company{
		public function __construct() {	
			$this->name = 'Wow-Company';
			$this->version = '2.0';
			add_action( 'admin_menu', array($this, 'add_menu') );
			add_action( 'plugins_loaded', array($this, 'plugin_check') );
			add_action( 'admin_enqueue_scripts', array($this,'style' ) );
			add_filter( 'admin_footer_text', array($this, 'admin_footer_text') );			
		}						
		//register the plugin menu for backend.
		public function add_menu() {
			$icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iNTEyLjAwMDAwMHB0IiBoZWlnaHQ9IjUxMi4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDUxMi4wMDAwMDAgNTEyLjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgo8bWV0YWRhdGE+CkNyZWF0ZWQgYnkgcG90cmFjZSAxLjE1LCB3cml0dGVuIGJ5IFBldGVyIFNlbGluZ2VyIDIwMDEtMjAxNwo8L21ldGFkYXRhPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjAwMDAwMCw1MTIuMDAwMDAwKSBzY2FsZSgwLjEwMDAwMCwtMC4xMDAwMDApIgpmaWxsPSIjMDAwMDAwIiBzdHJva2U9Im5vbmUiPgo8cGF0aCBkPSJNMjQ4MyA1MTAwIGMtNzEgLTQzIC02OCAtMTggLTcxIC01ODUgbC00IC01MTAgLTc3NCAtNTUwIGMtNDI2IC0zMDIKLTc4OCAtNTYzIC04MDQgLTU4MCAtMTMwIC0xMzUgLTcxIC0zNjggMTA5IC00MzIgbDUxIC0xOCAwIC0xMjEyIDAgLTEyMTMgMjA1CjAgMjA1IDAgMCAxMzA5IDAgMTMwOSAzOCAyOSBjMjAgMTcgMjc5IDIwMSA1NzQgNDExIGw1MzcgMzgyIDU1NiAtMzkyIDU1NQotMzkzIDAgLTEzMjcgMCAtMTMyOCAyMDUgMCAyMDUgMCAwIDEyMTAgYzAgOTYwIDMgMTIxMSAxMyAxMjE0IDYgMiAzNSA5IDYyCjE1IDE4MiA0MiAyNjQgMjY2IDE1MiA0MTMgLTIyIDI5IC0yNjkgMjA5IC04MTkgNTk3IGwtNzg3IDU1NiAtMSA4OCAwIDg3IDQ4NQowIDQ4NSAwIC0xMzYgMjAxIC0xMzcgMjAxIDEzMiAxOTMgYzcyIDEwNyAxMzEgMTk2IDEzMSAxOTkgMCAzIC0yMTYgNiAtNDgwIDYKbC00ODAgMCAwIDIzIGMwIDg3IC0xMjcgMTQ2IC0yMDcgOTd6Ii8+CjxwYXRoIGQ9Ik0yMTM2IDI4MjggbC00MTggLTI3MSA1IC00NTYgYzQgLTQ3NSA2IC01MDIgNDkgLTU1NiA0OCAtNjEgMzAgLTYwCjc0NyAtNjMgNzIyIC0zIDc0MyAtMiA3OTcgNTIgNjEgNjEgNjQgODggNjMgNTg1IGwwIDQ0NiAtMzg2IDI1MCBjLTIxMiAxMzgKLTM5OCAyNTggLTQxMyAyNjcgbC0yNiAxOCAtNDE4IC0yNzJ6IG02MzIgLTM1MyBsMjAyIC0xMzAgMCAtMjI3IDAgLTIyOCAtNDE1CjAgLTQxNSAwIDAgMjI4IDAgMjI3IDIwMyAxMzIgYzExMSA3MyAyMDcgMTMyIDIxMyAxMzAgNiAtMSAxMDEgLTYwIDIxMiAtMTMyeiIvPgo8cGF0aCBkPSJNMjQ0NSAxMzQxIGMtMzA1IC00OSAtNTIxIC0yNTIgLTU3MCAtNTM1IC0xMSAtNjggLTE1IC0xNzEgLTE1IC00NDcKbDAgLTM1OSAyMTAgMCAyMTAgMCAwIDM2OCBjMCAzNjMgMCAzNjcgMjQgNDE3IDQxIDg5IDEyMiAxNDUgMjIzIDE1MyAxMTcgOQoyMTQgLTQxIDI2OCAtMTM5IGwzMCAtNTQgMyAtMzczIDMgLTM3MiAyMDQgMCAyMDUgMCAwIDM4OCBjMCA0MzQgLTIgNDQ5IC02OQo1ODcgLTg0IDE3MCAtMjQzIDI5NiAtNDQ2IDM1MSAtNjMgMTcgLTIxNSAyNSAtMjgwIDE1eiIvPgo8L2c+Cjwvc3ZnPgo=';
			add_menu_page('Wow-Company', 'Wow-Company', 'manage_options', 'wow-company', array($this, 'main_page'), $icon);	
			add_submenu_page('wow-company', 'Get More', 'Get More', 'manage_options', 'wow-company');
		}
		public function style(){
			wp_enqueue_style('wow-company', plugin_dir_url(__FILE__) . 'css/style.css', null, $this->version);
			wp_enqueue_script('wow-company', plugin_dir_url( __FILE__ ) . 'js/script.js', array('jquery'), $this->version);
		}
		//menu page
		public function main_page() {
			global $wow_company_plugin;	
			$wow_company_plugin = true;
			include( 'menu/index.php' );			
			wp_enqueue_style( 'wow-company-icon', plugin_dir_url(__FILE__) . 'font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
		}		
		public function plugin_check() {
			if (isset($_POST['wow_plugin_nonce_field'])) {
				if ( !empty($_POST) && wp_verify_nonce($_POST['wow_plugin_nonce_field'],'wow_plugin_action') && current_user_can('manage_options')){
					self:: save_data();
				}
			}
		}
		public function save_data(){
			global $wpdb;
			$objItem = new WOW_DATA();
			$add = (isset($_REQUEST["add"])) ? sanitize_text_field($_REQUEST["add"]) : '';
			$data = (isset($_REQUEST["data"])) ? sanitize_text_field($_REQUEST["data"]) : '';
			$page = sanitize_text_field($_REQUEST["page"]);
			$id = absint($_POST['id']);
			if (isset($_POST["submit"])) {
				if (sanitize_text_field($_POST["add"]) == "1") {
					$objItem->addNewItem($data, $_POST);
					header("Location:admin.php?page=".$page."&info=saved");
					exit;
				} 
				else if (sanitize_text_field($_POST["add"]) == "2") {
					$objItem->updItem($data, $_POST);
					header("Location:admin.php?page=".$page."&tool=add&act=update&id=".$id."&info=update");
					exit;
				}
			}
		}
		public function admin_footer_text( $footer_text ) {
			global $wow_company_plugin;
			if ( $wow_company_plugin == true ) {
				$rate_text = sprintf( '<span id="footer-thankyou">Developed by <a href="https://wow-estore.com/author/admin/?author_downloads=true" target="_blank">Wow-Company</a> | <a href="https://www.facebook.com/wowaffect/" target="_blank">Join us on Facebook</a></span>');
				return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
			}
			else {
				return $footer_text;
			}
		}
	}
$Wow_Company = new Wow_Company();
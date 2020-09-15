<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       piwebsolution.com
 * @since      1.0.0
 *
 * @package    Http2_Push_Content
 * @subpackage Http2_Push_Content/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Http2_Push_Content
 * @subpackage Http2_Push_Content/public
 * @author     piwebsolution <rajeshsingh520@gmail.com>
 */
if(!class_exists("Http2_Push_Content_Apply_To")){
class Http2_Push_Content_Apply_To {

	

	public $apply_to;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( ) {
				
	}

	function apply_to_options(){
		?>
			<option disabled><?php _e('Select', 'http2-push-content'); ?></option>
			<option value="all" {{if value.apply_to == 'all'}}selected="selected"{{/if}}>All Pages</option>
			<option value="front_page" {{if value.apply_to == 'front_page'}}selected="selected"{{/if}}>On Front Page</option>
			<option value="page" {{if value.apply_to == 'page'}}selected="selected"{{/if}}>On Page</option>
			<option value="page_exclude_front_page" {{if value.apply_to == 'page_exclude_front_page'}}selected="selected"{{/if}}>On Page exclude front page</option>

			<option value="mobile" {{if value.apply_to == 'mobile'}}selected="selected"{{/if}}   disabled>Mobile or tablet Device  (PRO version)</option>
			<option value="not_mobile" {{if value.apply_to == 'not_mobile'}}selected="selected"{{/if}}   disabled>Desktop (PRO version)</option>
			<option value="single" {{if value.apply_to == 'single'}}selected="selected"{{/if}}  disabled>On Single Post (PRO version)</option>                        
			<option value="home" {{if value.apply_to == 'home'}}selected="selected"{{/if}}  disabled>On Blog Home (PRO version)</option>                        
			<option value="category" {{if value.apply_to == 'category'}}selected="selected"{{/if}}  disabled>On Category (PRO version)</option>                        
			<option value="tag" {{if value.apply_to == 'tag'}}selected="selected"{{/if}}  disabled>On Tag (PRO version)</option>                        
			<option value="search" {{if value.apply_to == 'search'}}selected="selected"{{/if}}  disabled>On Search Page (PRO version)</option>                        
			<option value="rtl" {{if value.apply_to == 'rtl'}}selected="selected"{{/if}}  disabled>On RTL Page (PRO version)</option>

			<option value="woocommerce_category" {{if value.apply_to == 'woocommerce_category'}}selected="selected"{{/if}} disabled>On WooCommerce category page (PRO version)</option>
			<option value="woocommerce_shop" {{if value.apply_to == 'woocommerce_shop'}}selected="selected"{{/if}} disabled>On WooCommerce shop page (PRO version)</option>
			<option value="woocommerce_single_product" {{if value.apply_to == 'woocommerce_single_product'}}selected="selected"{{/if}} disabled>On WooCommerce Single product page (PRO version)</option>

			<option value="woocommerce_cart" {{if value.apply_to == 'woocommerce_cart'}}selected="selected"{{/if}} disabled>On WooCommerce cart page (PRO version)</option>
			<option value="woocommerce_checkout" {{if value.apply_to == 'woocommerce_checkout'}}selected="selected"{{/if}} disabled>On WooCommerce checkout page (PRO version)</option>

			<option value="page_exclude_woo_cart_and_checkout" {{if value.apply_to == 'page_exclude_woo_cart_and_checkout'}}selected="selected"{{/if}} disabled>All Pages exclude WooCommerce Cart & Checkout Page (PRO version)</option>  
		<?php
	}

	/**
	 * It check the asset type and calls appropriate check function 
	 * and if asset apply to matches present page type then it return true else it return false
	 * if any mismatch happen it will return true and asset will be applied on global scale
	 */
	function check($apply_to){
		if(isset($apply_to)){
			$apply_to = $apply_to;
			if(method_exists($this, 'is_'.$apply_to)){
				return $this->{'is_'.$apply_to}();
			}else{
				return true;
			}
		}else{
			return true;
		}
	}

	function is_all(){
		return true;
	}

	function is_front_page(){
		if(function_exists('is_front_page')){
			return is_front_page();
		}
	}

	function is_page(){
		if(function_exists('is_page')){
			return is_page();
		}
	}

	function is_page_exclude_front_page(){
		if(is_page() && !is_front_page()){
			return true;
		}
		return false;
	}
	
}

}
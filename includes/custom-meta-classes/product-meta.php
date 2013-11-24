<?php

function call_ProductMeta(){
	new ProductMeta();
}

class ProductMeta{
	public function __construct(){
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save'));
	}

	public function add_meta_boxes($post_type){
		$allowed_post_types = array('product');
		if(in_array($post_type, $allowed_post_types)){
			add_meta_box(
				'product_meta_fields',
				__('Extra Product Fields'),
				array($this, 'render_box_fields'),
				$post_type
			);
		}
	}

	public function render_box_fields(){
		global $post;

		$paypal_embed = get_post_meta($post->ID, 'product_paypal_embed', true);
		$product_price = get_post_meta($post->ID, 'product_price', true);

		//price field


		//paypal field
		wp_nonce_field('product_paypal_verify', 'product_paypal_verify_value');

echo <<<EOT
		<label for="product_paypal_field">Paypal Embed</label>
		<textarea id="product_paypal_field" name="product_paypal_field" style="width:100%;" rows="8">$paypal_embed</textarea>
EOT;

		wp_nonce_field('product_price_verify', 'product_price_verify_value');

echo <<<EOT
		<label for="product_price_field">Product Price</label>
		<input type="text" id="product_price_field" name="product_price_field" style="width:100%;" value="$product_price">
EOT;

	}

	public function save($post_id){
		if(!isset($_POST['product_paypal_field_value'])){
			return;
		}

		$paypal_value = $_POST['product_paypal_verify_value'];
		$price_value = $_POST['product_price_verify_value'];

		if(!wp_verify_nonce($paypal_value, 'product_paypal_verify') || !wp_verify_nonce($price_value, 'product_price_verify')){
			die('couldn\'t verify');
		}

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
			return $post_id;
		}

		if($_POST['post_type'] == 'page'){
			if(!current_user_can('edit_page', $post_id)){
				die('cannot edit page');
			}
		}else{
			if(!current_user_can('edit_post', $post_id)){
				die('cannot edit '.$_POST['post_type']);
			}
		}

		update_post_meta($post_id, 'product_paypal_embed', $_POST['product_paypal_field']);
		update_post_meta($post_id, 'product_price', $_POST['product_price_field']);

	}
}
<?php

function call_ProductMeta(){
	new ProductMeta();
}

class ProductMeta{
	public function __construct(){
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save'));
		add_action('admin_enqueue_scripts', array($this,'load_script'));
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

		//http://themefoundation.com/wordpress-meta-boxes-guide/
		// ^^ js for calling media library ^^
		$photos = get_post_meta($post->ID, 'product_photo', false);
		// error_log(print_r($photos, true));
		wp_nonce_field('product_photo_verify', 'product_photo_verify_value');

		echo '<label for="product_photo">product Photos</label>';
		echo '<input type="text" id="product_photo_0" name="product_photo[0]" value="'.$photos[0][0].'" style="width:100%;">';

		foreach($photos[0] as $key => $photo){
			if($key != 0){
				echo '<input type="text" id="product_photo_'.$key.'" name="product_photo['.$key.']" value="'.$photo.'" style="width:100%">';
			}
		}
		echo '<button class="add-product-photo-input">Add another photo</button>';

	}

	public function save($post_id){
		if(!isset($_POST['product_paypal_field']) && !isset($_POST['product_price_field']) && !isset($_POST['product_photo'])){
			return;
		}

		$photo_verify = $_POST['product_photo_verify_value'];
		$paypal_value = $_POST['product_paypal_verify_value'];
		$price_value = $_POST['product_price_verify_value'];

		if(!wp_verify_nonce($paypal_value, 'product_paypal_verify') || !wp_verify_nonce($price_value, 'product_price_verify') || !wp_verify_nonce($photo_verify, 'product_photo_verify')){
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

		update_post_meta($post_id, 'product_photo', $_POST['product_photo']);
		update_post_meta($post_id, 'product_paypal_embed', $_POST['product_paypal_field']);
		update_post_meta($post_id, 'product_price', $_POST['product_price_field']);

	}

	public function load_script(){
		wp_enqueue_media();
		wp_register_script('admin-js',get_template_directory_uri().'/js/admin.js', array('jquery'));
		wp_enqueue_script('admin-js');
	}
}
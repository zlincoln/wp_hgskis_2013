<?php

function call_SkisMeta(){
	new SkisMeta();
}

class SkisMeta{
	public function __construct(){
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save'));
	}

	public function add_meta_boxes($post_type){
		$allowed_post_types = array('page');
		if(in_array($post_type, $allowed_post_types)){
			add_meta_box(
				'ski_option_box',
				__('Ski Options'),
				array($this, 'render_box_fields'),
				$post_type
			);
		}
	}

	public function render_box_fields(){

		global $post;

		$paypal_embed = get_post_meta($post->ID, 'ski_paypal_embed', true);

		//paypal field
		wp_nonce_field('ski_paypal_verify', 'ski_paypal_field_value');
echo <<<EOT
		<label for="ski_paypal_field">Paypal Embed</label>
		<textarea id="ski_paypal_field" name="ski_paypal_field" style="width:100%;" rows="8">$paypal_embed</textarea>
EOT;

	//http://wordpress.stackexchange.com/questions/436/is-there-a-way-to-get-n-number-of-wysiwyg-editors-in-a-custom-post-type

	}

	public function save($post_id){
		if(!isset($_POST['ski_paypal_field_value'])){
			return;
		}

		$paypal_value = $_POST['ski_paypal_field_value'];

		if(!wp_verify_nonce($paypal_value, 'ski_paypal_verify')){
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

		update_post_meta($post_id, 'ski_paypal_embed', $_POST['ski_paypal_field']);

	}
}
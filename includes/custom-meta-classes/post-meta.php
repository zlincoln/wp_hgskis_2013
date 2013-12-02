<?php

function call_PostMeta(){
	new PostMeta();
}

class PostMeta{
	public function __construct(){
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save'));
	}

	public function add_meta_boxes($post_type){
		$allowed_post_types = array('post');
		if(in_array($post_type, $allowed_post_types)){
			add_meta_box(
				'post_meta_fields',
				__('Extra Post Fields'),
				array($this, 'render_box_fields'),
				$post_type
			);
		}
	}

	public function render_box_fields(){
		global $post;

		$vimeo_embed = get_post_meta($post->ID, 'vimeo_embed', true);

		wp_nonce_field('vimeo_embed_verify', 'vimeo_embed_verify_value');

echo <<<EOT
	<label for="vimeo_embed_field">Vimeo Embed</label>
	<input type="text" id="vimeo_embed_field" name="vimeo_embed_field" value='$vimeo_embed' style="width:100%;">
EOT;

	}

	public function save($post_id){
		if(!isset($_POST['vimeo_embed_verify_value'])){
			return;
		}

		$vimeo_embed_value = $_POST['vimeo_embed_verify_value'];

		// if(!wp_verify_nonce($vimeo_embed_value, 'vimeo_embed_verify')){
		// 	die('couldn\'t verify');
		// }

		if($_POST['post_type'] == 'page'){
			if(!current_user_can('edit_page', $post_id)){
				die('cannot edit page');
			}
		}else{
			if(!current_user_can('edit_post', $post_id)){
				die('cannot edit '.$_POST['post_type']);
			}
		}

		update_post_meta($post_id, 'vimeo_embed', $_POST['vimeo_embed_field']);
	}
}
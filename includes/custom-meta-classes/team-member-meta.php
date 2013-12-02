<?php

function call_MemberMeta(){
	new MemberMeta();
}

class MemberMeta{
	public function __construct(){
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save'));
		add_action('admin_enqueue_scripts', array($this,'load_script'));
	}

	public function add_meta_boxes($post_type){
		$allowed_post_types = array('team_member');
		if(in_array($post_type, $allowed_post_types)){
			add_meta_box(
				'post_meta_fields',
				__('Extra Fields'),
				array($this, 'render_box_fields'),
				$post_type
			);
		}
	}	

	public function render_box_fields(){
		global $post;

		$duties = get_post_meta($post->ID, 'duties', true);

		wp_nonce_field('duties_verify', 'duties_verify_value');

echo <<<EOT
	<label for="duties_field">Duties Label</label>
	<input type="text" id="duties_field" name="duties_field" value="$duties" style="width:100%;">
EOT;

		$vimeo_embed = get_post_meta($post->ID, 'vimeo_embed', true);

		wp_nonce_field('vimeo_embed_verify', 'vimeo_embed_verify_value');

echo <<<EOT
	<label for="vimeo_embed_field">Vimeo Embed</label>
	<input type="text" id="vimeo_embed_field" name="vimeo_embed_field" value='$vimeo_embed' style="width:100%">
EOT;

		//http://themefoundation.com/wordpress-meta-boxes-guide/
		// ^^ js for calling media library ^^
		$photos = get_post_meta($post->ID, 'team_photo', false);
		// error_log(print_r($photos, true));
		wp_nonce_field('team_photo_verify', 'team_photo_verify_value');

		echo '<label for="team_photo">Team Photos</label>';
		echo '<input type="text" id="team_photo_0" name="team_photo[0]" value="'.$photos[0][0].'" style="width:100%;">';

		if(is_array($photos)){
			foreach($photos[0] as $key => $photo){
				if($key != 0){
					echo '<input type="text" id="team_photo_'.$key.'" name="team_photo['.$key.']" value="'.$photo.'" style="width:100%">';
				}
			}
		}
		echo '<button class="add-team-photo-input">Add another photo</button>';
	}

	public function save($post_id){
		if(!isset($_POST['vimeo_embed_field']) && !isset($_POST['team_photo']) && !isset($_POST['duties_field'])){
			return;
		}

		$duties = $_POST['duties_field'];
		$photos = $_POST['team_photo'];
		$vimeo_embed = $_POST['vimeo_embed_field'];

		$duties_verify = $_POST['duties_verify_value'];
		$photo_verify = $_POST['team_photo_verify_value'];
		$vimeo_embed_verify = $_POST['vimeo_embed_verify_value'];

		if(!wp_verify_nonce($photo_verify, 'team_photo_verify') || !wp_verify_nonce($vimeo_embed_verify, 'vimeo_embed_verify') || !wp_verify_nonce($duties_verify, 'duties_verify')){
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

		update_post_meta($post_id, 'duties', $duties);
		update_post_meta($post_id, 'vimeo_embed', $_POST['vimeo_embed_field']);
		update_post_meta($post_id, 'team_photo', $_POST['team_photo']);
	}

	public function load_script(){
		wp_enqueue_media();
		wp_register_script('admin-js',get_template_directory_uri().'/js/admin.js', array('jquery'));
		wp_enqueue_script('admin-js');
	}
}
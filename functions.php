<?php
	
define('THEME_DIR', 'wp-content/themes/hgskis');

register_nav_menus(array(
	'main_nav_left' => 'Main Navigation Menu (left)',
	'main_nav_right' => 'Main Navigation Menu (right)'
));

add_theme_support('post-thumbnails', array('post', 'team_member', 'product'));

//name, width, height
//last param: true = hard; false = soft, proportional
add_image_size('gallery-crop', 100, 100, true);

//custom post types
include('includes/custom-post-types.php');

//load meta classes
include('includes/custom-meta-classes/skis-meta.php');
include('includes/custom-meta-classes/post-meta.php');

//utility for adding meta actions onload
function loadMetaClass($class){
	add_action('load-post.php', 'call_'.trim($class));
	add_action('load-post-new.php', 'call_'.trim($class));
}

//loading different meta fields depending on template
//first get post id
$post_id = ($_GET['post']) ? $_GET['post'] : $_POST['post_ID'];
//determine template
$template_file = get_post_meta($post_id, '_wp_page_template', TRUE);

switch ($template_file){
	case 'home.php':
		function homePageQuery($query){
			if($query->is_main_query()){
				$query->set('posts_per_page', 5);
				$query->set('category_name', 'video');
			}
		}
		add_action('pre_get_posts', 'homePageQuery');
		break;
	case 'family.php':
		break;
	case 'goods.php':
		break;
	case 'media.php':
		break;
	case 'skis.php':
		loadMetaClass('SkisMeta');
		break;
	case 'about.php':
		break;
	default:
}

//load on every page
loadMetaClass('PostMeta');

?>
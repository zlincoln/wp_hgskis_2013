<?php

//post types
function teamMember(){
	$labels = array(
		'name' => __('Team Members'),
		'singular_name' => __('Team Member'),
		'add_new' => __('Add New'),
		'add_new_item' => __('Add New Team Member'),
		'edit_item' => __('Edit Team Member'),
		'new_item' => __('New Team Member'),
		'all_items' => __('All Team Members'),
		'view_item' => __('View Team Member'),
		'search_items' => __('Search Team Members'),
		'not_found' => __('No Team Members Found'),
		'not_found_in_trash' => __('No Team Members found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Team Members'
	);

	$args = array(
		'labels' => $labels,
		'description' => 'Manage team members',
		'public' => true,
		'menu_position' => 20,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
		'has_archive' => false
	);

	register_post_type('team_member', $args);
}

function product(){
	$labels = array(
		'name' => __('Products'),
		'singular_name' => __('Product'),
		'add_new' => __('Add Product'),
		'add_new_item' => __('Add New Product'),
		'edit_item' => __('Edit Product'),
		'new_item' => __('New Product'),
		'all_items' => __('All Products'),
		'view_item' => __('View Product'),
		'search_items' => __('Search Products'),
		'not_found' => __('No Products Found'),
		'not_found_in_trash' => __('No Products found in the Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'Products'
	);

	$args = array(
		'labels' => $labels,
		'description' => 'Manage team members',
		'public' => true,
		'menu_position' => 20,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
		'taxonomies' => array('product_category'),
		'has_archive' => false
	);

	register_post_type('product', $args);
}

add_action('init', 'teamMember');
add_action('init', 'product');

//taxonomies
function teamMemberCategories(){
	$labels = array(
		'name' => __('Team Member Categories'),
		'singular_name' => __('Team Member Category'),
		'add_new_item' => __('Add New Category'),
		'new_item_name' => __('New Team Category'),
		'edit_item' => __('Edit Category'),
		'update_item' => __('Update Team Category'),
		'all_items' => __('All Categories'),
		'search_items' => __('Search Categories'),
		'menu_name' => 'Team Member Categories',
		'parent_item' => __('Parent Team Category'),
		'parent_item_colon' => __('Parent Team Category:')
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true
	);

	register_taxonomy('member_category', 'team_member', $args);
}

add_action('init', 'teamMemberCategories', 0);

//saving data (after defining post meta)
function saveTeamMember($post_id){
	//http://wp.smashingmagazine.com/2012/11/08/complete-guide-custom-post-types/
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	}

	if($_POST['post_type'] == 'page'){
		if(!current_user_can('edit_page', $post_id)){
			return;
		}
	}else{
		if(!current_user_can('edit_post', $post_id)){
			return;
		}
	}

	//$product_price = $_POST['product_price'];
	//update_post_meta($post_id, 'product_price', $product_price);
}

add_action('save_post', 'saveTeamMember');
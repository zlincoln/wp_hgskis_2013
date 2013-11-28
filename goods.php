<?php
/*
Template Name: Goods Page
*/
get_header();

$args = array(
	'post_type' => 'product'
);

$products = new WP_Query($args);

$count = 1;

?>

<section class="gallery-detail-template goods container">
	<div id="detail-target" class="row" data-curr-detail="0"></div>
	<div class="item-gallery row">
		<?php
		if($products->have_posts()): while($products->have_posts()): $products->the_post();
		include('includes/good-detail-template.php');
		endwhile;
		endif;
		?>
	</div>
</section>
<?php include('includes/gallery-script.php'); ?>

<?php 
get_footer();
?>
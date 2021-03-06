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
		else:
		?>
		<?php
		if(have_posts()): while(have_posts()): the_post();?>
		<div class="col-xs-12 wysiwyg-content">
			<?php the_content(); ?>
		</div>
		<?php
		endwhile;
		endif;
		endif;
		?>
	</div>
</section>
<?php include('includes/gallery-script.php'); ?>

<?php 
get_footer();
?>
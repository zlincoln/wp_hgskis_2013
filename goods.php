<?php
/*
Template Name: Goods Page
*/
get_header();

$args = array(
	'post_type' => 'product'
);

$products = new WP_Query($args);

?>

<section class="gallery-detail-template goods container">
	<div id="detail-target" class="row" data-curr-detail="null"></div>
	<div class="item-gallery row">
		<?php
		if($products->have_posts()): while($products->have_posts()): $products->the_post();
		$product_price = get_post_meta($post->ID, 'product_price', true);
		$product_paypal_embed = get_post_meta($post->ID, 'product_paypal_embed', true);
		?>
		<a class="item-wrapper col-xs-12 col-sm-6 col-md-4" href="<?php the_permalink(); ?>">
			<div class="item-viewport">
				<?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
				<?php if($product_price != ''):?>
				<span class="price"><?= $product_price; ?></span>
				<?php endif; ?>
			</div>
			<div class="item-details">
				<h3 class="item-title"><?php the_title(); ?></h3>
				<div class="image-gallery">
					<!-- <img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000"> -->
				</div>
				<div class="wysiwyg-content">
					<?php the_content(); ?>
					<?= $product_paypal_embed; ?>
				</div>
			</div>
		</a>
		<?php
		endwhile;
		endif;
		?>
	</div>
</section>
<?php include('includes/gallery-script.php'); ?>

<?php 
get_footer();
?>
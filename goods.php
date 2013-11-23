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
		<?
		if($products->have_posts()): while($products->have_posts()): $products->the_post();
		?>
		<a class="item-wrapper col-xs-12 col-sm-6 col-md-4" href="goods-detail.php">
			<div class="item-viewport">
				<img class="img-responsive" src="images/product-images/coach-jacket.jpg" alt="Coach Jacket">
				<span class="price">$55.00</span>
			</div>
			<div class="item-details">
				<h3 class="item-title">The Chief Coast Coach</h3>
				<div class="image-gallery">
					<!-- <img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000"> -->
				</div>
				<div class="wysiwyg-content">
					<p>Limited run: HG Coach Jacket</p>
					<span style="font-weight: bold">Size Chart:</span>
					<ul>
						<li>M: L:32" W:26.5"</li>
						<li>L: L:32" W:26.5"</li>
						<li>XL: L:32" W:26.5"</li>
						<li>2XL: L:32" W:26.5"</li>
					</ul>
					<form>
						<select>
							<option>Please Select Size</option>
							<option>M: L:32" W:26.5"</option>
							<option>L: L:32" W:26.5"</option>
							<option>XL: L:32" W:26.5"</option>
							<option>2XL: L:32" W:26.5"</option>
						</select>
						<input type="submit" class="btn btn-primary" name="submit" id="purchase-item-1" value="BUY">
					</form>
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
<?php
/*
Template Name: Goods Detail Page
*/
get_header();
if(have_posts()): while(have_posts()): the_post();
?>

<section class="gallery-detail-template goods detail-view">
	<div class="row">
		<ol class="breadcrumb col-xs-12">
			<li><a href="goods.html">Goods</a></li>
			<li class="active">The Chief Coast Coach</li>
		</ol>
	</div>
	<div id="detail-target" class="row" data-curr-detail="null">
		<div class="item-viewport col-md-8 col-sm-6">
			<img class="img-responsive" src="http://placehold.it/1200x1000">
			<span class="price">$55.00</span>
		</div>
		<div class="item-details">
			<h3 class="item-title">The chief coast coach</h3>
			<div class="image-gallery">
				<!-- <img class="img-responsive" src="http://placehold.it/1200x1000">
				<img class="img-responsive" src="http://placehold.it/1200x1000">
				<img class="img-responsive" src="http://placehold.it/1200x1000">
				<img class="img-responsive" src="http://placehold.it/1200x1000"> -->
			</div>
			<div class="wysiwyg-content">
				<p>Limited run: HG Coaches Jacket</p>
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
					<input type="submit" class="button button-primary" name="submit" id="purchase-item-1" value="BUY">
				</form>
			</div>
		</div>
	</div>
</section>

<?php 
endwhile;
endif;
get_footer();
?>
<?php
/*
Template Name: Ski Page
*/
get_header();
if(have_posts()): while(have_posts()): the_post();
?>

<section class="ski-detail">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1><span>Stinger</span><img class="img-responsive" src="images/product-images/stinger-logo.png" alt="Stinger"></h1>
				<img class="img-responsive" src="images/product-images/stinger-topsheet.png">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
				<h2>Stinger</h2>
				<div class="wysiwyg-content">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
				<div class="actions">
					<span class="price">$599</span>
					<a class="btn btn-primary">Buy</a>
				</div>
				<div class="reviews">
					<div class="review-wrap">
						<h6>Best pair of skis I've ever touched</h6>
						<ul class="rating">
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star-empty"></i></li>
						</ul>
						<p>This is a product review submitted by a real customer who loves everything about these skis!  He talks about how much fun they are to ride and how everyone notices the dope graphics and wonders where he got them.</p>
					</div>
					<div class="review-wrap">
						<h6>Best pair of skis I've ever touched</h6>
						<ul class="rating">
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star"></i></li>
							<li><i class="glyphicon glyphicon-star-empty"></i></li>
						</ul>
						<p>This is a product review submitted by a real customer who loves everything about these skis!  He talks about how much fun they are to ride and how everyone notices the dope graphics and wonders where he got them.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
endwhile;
endif;
get_footer();
?>
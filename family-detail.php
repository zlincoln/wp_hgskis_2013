<?php
/*
Template Name: Family Detail Page
*/

get_header();

if(have_posts()): while(have_posts()): the_post();
?>

<section class="gallery-detail-template family container detail-view">
	<div id="detail-target" class="row" data-curr-detail="null">
		<div class="item-viewport col-md-8 col-sm-6">
			<img class="img-responsive" src="images/family/connor.png" alt="Conner Gaeta">
		</div>
		<div class="item-details">
			<h3 class="item-title">Connor Gaeta</h3>
			<div class="image-gallery">
				<!-- <img class="img-responsive" src="http://placehold.it/1200x1000">
				<img class="img-responsive" src="http://placehold.it/1200x1000">
				<img class="img-responsive" src="http://placehold.it/1200x1000">
				<img class="img-responsive" src="http://placehold.it/1200x1000"> -->
			</div>
			<div class="wysiwyg-content">
				<p>I got started with HG about 3 years ago well it was still in its infancy stages. From then it's grown out of a dingy garage in downtown Burlington to a real shop. I am always trying to see how I can change my personal style to reflect in HG itself. Working with HG really allows everything we do on the snow reflect in the company itself.</p>
			</div>
		</div>
	</div>
</section>

<?php 
endwhile;
endif;
get_footer();
?>
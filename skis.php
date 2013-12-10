<?php
/*
Template Name: Ski Page
*/
get_header();
if(have_posts()): while(have_posts()): the_post();
$content = get_the_content();
$splitContent = explode(':::right_side:::',$content);
?>

<section class="ski-detail">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-5 wysiwyg-content">
				<?= $splitContent[0]; ?>
			</div>
			<div class="col-xs-12 col-md-2 ski-image">
				<?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
			</div>
			<div class="col-xs-12 col-md-5 wysiwyg-content">
				<?= $splitContent[1]; ?>
				<?php echo get_post_meta($post->ID,'ski_paypal_embed', true); ?>
				<p class="post-paypal-content">
					<!--
					<span style="display:block;">*Pre-Order skis will ship by mid November*</span>
				  -->
					<img class="wp-image-2070" alt="Handmade on the North American East Coast" src="http://hgskis.com/wp-content/uploads/2013/10/North-AmericanFIN.png" width="163" height="163" />
				</p>
			</div>
		</div>
		<!--
		<div class="row">
			<div class="col-xs-12 dimensions">
				<table class="table" style="margin-top: 30px;">
					<thead>
						<th>Length</th>
						<th>Dimensions</th>
						<th>Turning Radius</th>
						<th>Weight</th>
					</thead>
					<tbody>
						<tr>
							<td>172cm</td>
							<td>125-96-125mm</td>
							<td>18m</td>
							<td>?lb/ski</td>
						</tr>
						<tr>
							<td>168cm</td>
							<td>125-96-125mm</td>
							<td>18m</td>
							<td>?lb/ski</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		-->
	</div>
</section>

<?php 
endwhile;
endif;
get_footer();
?>
<?php
/*
Template Name: About Page
*/

get_header();

if(have_posts()): while(have_posts()): the_post();
?>
<section class="container">
	<div class="row">
		<h1><span>Behind the Brand</span></h1>
	</div>
	<div class="row">
		<div class="col-xs-12 wysiwyg-content">
			<?php the_content(); ?>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(function(){
		$('.first-stop').fitVids();
	});
</script>
<?php 
endwhile;
endif;
get_footer();
?>
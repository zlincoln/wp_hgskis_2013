<?php
/*
Template Name: Ski Page
*/
get_header();
if(have_posts()): while(have_posts()): the_post();
?>

<section class="ski-detail">
	<div class="container">
		
	</div>
</section>

<?php 
endwhile;
endif;
get_footer();
?>
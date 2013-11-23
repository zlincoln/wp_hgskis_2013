<?php
/*
Template Name: About Page
*/

get_header();

if(have_posts()): while(have_posts()): the_post();
?>
<section class="container">
	<div class="row">
		<div class="col-sm-6 col-lg-9 wysiwyg-content">
			<?php the_content(); ?>
		</div>
		<div class="col-sm-6 col-lg-3">
			<h3>Contact Us!</h3>
			<form role="form">
				<fieldset>
					<div class="form-group">
						<label for="contact-name">Name</label>
						<input type="text" class="text form-control" id="contact-name" name="contact-name" placeholder="Shreddy McSteez">
					</div>
					<div class="form-group">
						<label for="contact-email">Email</label>
						<input type="email" class="text email form-control" id="contact-email" name="contact-email" placeholder="skipow@allday.com">
					</div>
					<div class="form-group">
						<label for="contact-message">Message</label>
						<textarea class="textarea form-control" rows="3" placeholder="Your message here"></textarea>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</section>

<?php 
endwhile;
endif;
get_footer();
?>
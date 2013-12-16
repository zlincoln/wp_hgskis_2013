<?php
/*
Template Name: About Page
*/

get_header();

if(have_posts()): while(have_posts()): the_post();
?>
<section class="container about-page">
	<?php
	if(isset($_GET['success'])):?>
	<div class="row">
		<div class="alert alert-success col-xs-12">
			<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
			<span>We've recieved your email, thanks a ton dude!</span>
		</div>
	</div>
	<?php
	endif;
	?>
	<div class="row">
		<h1><span>Behind the Brand</span></h1>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<img src="http://hgskis.com/wp-content/uploads/2010/12/HG-7-of-7-e1386310509675.jpg" alt="HG (7 of 7)" class="alignnone size-full wp-image-2201 img-responsive" />
			<div class="photo-caption">
			"HG Skis is the East Coast's premier up and coming ski company. We build skis to improve our own experience, and then apply it to the skiers around us. As we begin to sell skis we consider all or our clients test pilots. We provide them with the very best ski, and they provide us with their opinions and recommendations."
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-8 wysiwyg-content">
			<?php the_content(); ?>
		</div>
		<div class="hidden-xs hidden-sm col-md-4">
			<form class="form" action="http://formmail.dreamhost.com/cgi-bin/formmail.cgi" method="POST">
				<input type="hidden" name="recipient" value="znlincoln@gmail.com">
				<input type="hidden" name="subject" value="New contact from website">
				<input type="hidden" name="redirect" value="http://hgskis.com?page_id=1323&amp;success=true">
				<input type="hidden" name="env_report" value="REMOTE_ADDR">
				<input type="hidden" name="print_config" value="message">
				<div class="form-group">
					<label for="realname">Name</label>
					<input type="text" id="realname" name="realname" class="form-control" placeholder="Steve">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" class="form-control" placeholder="skipow@allday.com">
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea id="message" name="message" class="form-control" placeholder="What's up?"></textarea>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 retailers">
			<h3>Retailers:</h3>
			<span style="text-transform: uppercase; display: block;">Check out our skis in person</span>
			<ul>
				<li>First Stop Board Barn</li>
				<li>8474 Rt. 4</li>
				<li>Killington, VT USA 05751</li>
				<li><a href="http://firststopboardbarn.com/">http://firststopboardbarn.com</a></li>
			</ul>
		</div>
		<div class="col-xs-12 col-sm-6 first-stop">
			<h3>HG Skis Presents: First Stop Board Barn</h3>
			<span>The first shop to carry HG Skis</span>
			<iframe src="//player.vimeo.com/video/56109563" height="281" width="500" allowfullscreen="" frameborder="0"></iframe>
			<span>Thanks for all the help over the years!</span>
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
<?php
/*
Template Name: Media Page
*/
get_header();
if(have_posts()): while(have_posts()): the_post();
?>

<section id="blog" class="container">
	<div class="row">
		<h1 class="col-xs-12">Latest Updates</h1>
		<div class="col-xs-12 col-sm-9 col-lg-9">
			<article class="panel panel-default">
				<div class="panel-heading">
					<h2>Presenting: Aurora Trailer</h2>
				</div>
				<div class="panel-body">
					<p>Aurora: n. the dawn.  We present the trailer for Aurora, our team movie for the 2012-2013 season. It was almost entirely filmed in the northeast exposing some very unique features custom to the area.  Filmed & Edited by: Sam Rogers & Charlie Stemen [...]</p>
				</div>
				<div class="panel-footer clearfix">
					<a href="#" class="pull-right btn btn-primary">Read More</a>
				</div>
			</article>
			<article class="panel panel-default">
				<div class="panel-heading">
					<h2>City Prospect Apparel</h2>
				</div>
				<div class="panel-body">
					<p>Connor taking some laps through Sugarbush Parks for the new City Prospect Apparel edit, Enjoy! [...]</p>
				</div>
				<div class="panel-footer clearfix">
					<a href="#" class="pull-right btn btn-primary">Read More</a>
				</div>
			</article>
			<article class="panel panel-default">
				<div class="panel-heading">
					<h2>Powder Magazine</h2>
				</div>
				<div class="panel-body">
					<p>We had the pleasure of talking with Powder Magazine a few weeks back. Check out their write up on our talk and see where we came from and what our future is!     [...]</p>
				</div>
				<div class="panel-footer clearfix">
					<a href="#" class="pull-right btn btn-primary">Read More</a>
				</div>
			</article>
			<article class="panel panel-default">
				<div class="panel-heading">
					<h2>The Score</h2>
				</div>
				<div class="panel-body">
					<p>Finally blessed with over 2 feet of snow, Sugarbush Parks is primed and Connor and James take full advantage of the creative setup. The streets of Burlington and Winooski were calling us with fresh snow and we were finally able to put together some shots! [...]</p>
				</div>
				<div class="panel-footer clearfix">
					<a href="#" class="pull-right btn btn-primary">Read More</a>
				</div>
			</article>
			<article class="panel panel-default">
				<div class="panel-heading">
					<h2>Pushin'</h2>
				</div>
				<div class="panel-body">
					<p>Back with our first edit of the new season, the crew gets after some early urban features, we check in with LV up in Canada and get to see his park run from Chile, and finally James Amodeo and Connor Geata give a lesson on the down rail at Sugarbush Parks! [...]</p>
				</div>
				<div class="panel-footer clearfix">
					<a href="#" class="pull-right btn btn-primary">Read More</a>
				</div>
			</article>
			<?php include('includes/pagination.php'); ?>
		</div>
		<div class="col-12 col-sm-3 col-lg-3">
			<?php include('includes/blog-nav.php'); ?>
		</div>
	</div>
</section>

<?php 
endwhile;
endif;
get_footer();
?>
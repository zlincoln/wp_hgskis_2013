<?php
/*
Template Name: About Page
*/

get_header();

if(have_posts()): while(have_posts()): the_post();
?>
<section class="container about-page">
	<div class="row">
		<h1><span>Behind the Brand</span></h1>
		<?php
		if(isset($_GET['success'])):?>
			<div class="alert alert-success col-xs-12">
				<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
				<span>We've recieved your email, thanks a ton dude!</span>
			</div>
		<?php
		endif;
		?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<img src="http://hgskis.com/wp-content/uploads/2010/12/HG-7-of-7-e1386310509675.jpg" alt="HG (7 of 7)" class="alignnone size-full wp-image-2201 img-responsive" />
			<div class="photo-caption">
				<p>"HG Skis is the East Coast's premier up and coming ski company. We build skis to improve our own experience, and then apply it to the skiers around us. As we begin to sell skis we consider all or our clients test pilots. We provide them with the very best ski, and they provide us with their opinions and recommendations."</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-md-8 wysiwyg-content">
			<h3>Our history</h3>
			<?php the_content(); ?>
		</div>
		<div class="col-md-4">
			<h3>Contact Us!</h3>
			<form class="form well" action="http://formmail.dreamhost.com/cgi-bin/formmail.cgi" method="POST">
				<input type="hidden" name="recipient" value="info@hgskis.com">
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
				<button type="submit" class="btn btn-primary btn-block">Send</button>
			</form>
			<div class="contact-info">
				<ul class="addr">
					<li>
						<script type='text/javascript'>
						var v2="52285JJR65MDZMG";var v7=unescape("%5C%5CTWu%22-%21%5D%5C%3Ej9%22*");var v5=v2.length;var v1="";for(var v4=0;v4<v5;v4++){v1+=String.fromCharCode(v2.charCodeAt(v4)^v7.charCodeAt(v4));}document.write('<a href="javascript:void(0)" onclick="window.location=\'mail\u0074o\u003a'+v1+'?subject=Email'+'\'">'+'Email Us<\/a>');
						</script>
						<noscript><a href='http://w2.syronex.com/jmr/safemailto/#noscript'>email us</a>
						</noscript>
					</li>
					<li>HG Skis</li>
					<li>70 S. Winooski Ave #194</li>
					<li>Burlington, VT 05401</li>
				</ul>
				<p class="well">Mail us with a self addressed pre-postage stamped envelope for stickers!</p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 retailers">
			<h4>Retailers:</h4>
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
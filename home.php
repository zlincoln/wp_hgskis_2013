<?php
/*
Template Name: Home Page
*/

get_header();

$videos = new WP_Query('posts_per_page=5&category_name=video');

?>
<section class="hero">
	<div class="flexslider">
		<ul class="slides">
			<?php
			if($videos->have_posts()): while($videos->have_posts()): $videos->the_post();
			$vimeo_embed = get_post_meta($post->ID, 'vimeo_embed', true);
			if($vimeo_embed != ''):
			?>
			<li>
				<div class="embed">
					<?= $vimeo_embed; ?>
				</div>
				<div class="caption">
					<p><?php the_content(); ?></p>
				</div>
			</li>
			<?php
			endif;
			endwhile;
			endif;
			?>
		</ul>
	</div>
	<script type="text/javascript">
		$(function() {
			// prep videos for api calls
		 	// @todo: make sure to get ie8 indexof polyfill before release
			$('.flexslider iframe').each(function(index){
				var video = $(this),
						source = video.attr('src');
				if(source.indexOf('vimeo') != -1){
					var cutoffPoint,
							updatedSource;
					cutoffPoint = source.indexOf('?');
					updatedSource = source.substring(0, (cutoffPoint != -1) ? cutoffPoint : source.length);
					video.attr({
						id: 'player_'+index,
						src: updatedSource+'?api=1&amp;player_id=player_'+index
					});
					var player = document.getElementById('player_'+index);
					$f(player).addEvent('ready', ready);
				}
			});

			//create functions to pair flexslider with vimeo api
		  function addEvent(element, eventName, callback) {
		    if (element.addEventListener) {
		      element.addEventListener(eventName, callback, false)
		    } else {
		      element.attachEvent(eventName, callback, false);
		    }
		  }

		  function ready(player_id) {
		    var froogaloop = $f(player_id);
		    froogaloop.addEvent('play', function(data) {
		      $('.flexslider').flexslider("pause");
		    });
		    froogaloop.addEvent('pause', function(data) {
		      $('.flexslider').flexslider("play");
		    });
		  }

		  //remove extra embed stuff
		  $('.embed').each(function(){
		  	$(this).children().remove('*:not(iframe)');
		  });

		  //init flexslider and responsive videos
		  //@todo: 10sec delay
		  $(".flexslider").fitVids().flexslider({
		      animation: "slide",
		      useCSS: false,
		      animationLoop: false,
		      smoothHeight: true,
		      slideshowSpeed: 10000,
		      before: function(slider){
		      	//pause video before moving to next slide
		      	var video2Pause = $('.flexslider li.flex-active-slide iframe').attr('id'),
		      			player = document.getElementById(video2Pause);
		      	if(player){
		      		$f(player).api('pause');
		      	}
		      }
		  });
		});
	</script>
</section>
<?php 
get_footer();
?>
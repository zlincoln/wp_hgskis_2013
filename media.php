<?php
/*
Template Name: Media Page
*/
get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$media = new WP_Query('posts_per_page=2&paged='.$paged);
?>

<section id="blog" class="container">
	<div class="row">
		<h1><span>Latest Updates</span></h1>
	</div>
	<div class="row">
		<h1 class="col-xs-12">Latest Updates</h1>
		<div class="col-xs-12">
			<?php
			if($media->have_posts()): while($media->have_posts()): $media->the_post();
			$categories = wp_get_post_categories(get_the_ID(), array('fields'=>'slugs'));
			$vimeo_embed = get_post_meta(get_the_ID(), 'vimeo_embed', true);
			?>
			<article>
				<h2><?php the_title(); ?></h2>
				<?php
				if(in_array('video', $categories)): ?>
				<div class="embed">
					<?=  $vimeo_embed; ?>
				</div>
				<?php
				elseif(in_array('photo', $categories)): ?>
				<div class="image-wrapper">
					<?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
				</div>
				<?php
				endif;
				?>
				<div class="wysiwyg-content">
					<?php the_content(); ?>
				</div>
			</article>
			<?php
			endwhile;
			endif;
			$big = 999999999;
			echo paginate_links(array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format' => '?paged=%#%',
				'current' => max(1, $paged),
				'total' => $media->max_num_pages,
				'type' => 'list',
				'next_text' => '&raquo;',
				'prev_text' => '&laquo;'
			));
			?>
		</div>
		<!--
		<div class="col-12 col-sm-3 col-lg-3">
			<?php include('includes/blog-nav.php'); ?>
		</div>
		-->
	</div>
</section>
<script type="text/javascript">
	$(function(){
		$('article').fitVids();
	})
</script>
<?php 
get_footer();
?>
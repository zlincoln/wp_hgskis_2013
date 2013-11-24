<?php
/*
Template Name: Family Page
*/
get_header();

$args = array(
	'post_type' => 'team_member'
);

$members = new WP_Query($args);

?>

<section class="gallery-detail-template family container">
	<div id="detail-target" class="row" data-curr-detail="null"></div>
	<div class="row item-gallery">
		<h2 class="col-xs-12">Riders</h2>
		<?php
		if($members->have_posts()): while($members->have_posts()): $members->the_post();
		?>
		<a class="item-wrapper col-xs-12 col-sm-6 col-md-4" href="family-detail.php">
			<div class="item-viewport">
				<?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>
				<iframe src="<?= $member->videoURL; ?>"></iframe>
			</div>
			<div class="item-details">
				<h3 class="item-title"><?php the_title(); ?></h3>
				<div class="image-gallery">
					<!-- <img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000">
					<img class="img-responsive" src="http://placehold.it/1200x1000"> -->
				</div>
				<div class="wysiwyg-content">
					<?php the_content(); ?>
				</div>
			</div>
		</a>
		<?php
		endwhile;
		endif;
		?>
	</div>
</section>
<?php include('includes/gallery-script.php'); ?>

<?php
get_footer();
?>
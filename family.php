<?php
/*
Template Name: Family Page
*/
get_header();

$rider_args = array(
	'post_type' => 'team_member',
	'tax_query' => array(
		array(
			'taxonomy' => 'member_category',
			'field' => 'slug',
			'terms' => 'riders'
		)
	)
);

$team_args = array(
	'post_type' => 'team_member',
	'tax_query' => array(
		array(
			'taxonomy' => 'member_category',
			'field' => 'slug',
			'terms' => 'team'
		)
	)
);

$count = 1;

?>

<section class="gallery-detail-template family container">
	<div class="row">
		<h1 class="col-xs-12"><span>The HG Famila</span></h1>
	</div>
	<div id="detail-target" class="row" data-curr-detail="0"></div>
	<div class="row item-gallery">
		<h2 class="col-xs-12">Riders</h2>
		<?php
		$riders = new WP_Query($rider_args);
		if($riders->have_posts()): while($riders->have_posts()): $riders->the_post();
		include('includes/team-detail-template.php');
		endwhile;
		endif;
		?>
	</div><!-- /.row -->
	<div class="row item-gallery">
		<h2 class="col-xs-12">The Minds</h2>
		<?php
		$team = new WP_Query($team_args);
		if($team->have_posts()): while($team->have_posts()): $team->the_post();
		include('includes/team-detail-template.php');
		endwhile;
		endif;
		?>
	</div>
</section>
<?php include('includes/gallery-script.php'); ?>

<?php
get_footer();
?>
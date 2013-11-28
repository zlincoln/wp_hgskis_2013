<?php
$photo_array = get_post_meta(get_the_ID(), 'team_photo', false);
$duties = get_post_meta(get_the_ID(), 'duties', true);
$vimeo_embed = get_post_meta(get_the_ID(), 'vimeo_embed', true);
?>
<a class="item-wrapper col-xs-12 col-sm-6 col-md-4" href="javascript:void(0)" data-curr-detail="<?= $member_count; ?>">
	<div class="item-viewport">
		<div class="flex-holder">
			<ul class="slides">
				<li>
					<?php
					the_post_thumbnail('full', array('class'=>'img-responsive'));
					?>
				</li>
				<?php if($vimeo_embed != ''): ?>
				<li class="embed">
					<?= $vimeo_embed; ?>
				</li>
				<?php endif; ?>
				<?php
				foreach($photo_array[0] as $photo):
				if($photo != ''):
				?>
				<li>
					<img class="img-responsive" src="<?= $photo; ?>" alt="<?php the_title(); ?>">
				</li>
				<?php
				endif;
				endforeach;
				?>
			</ul>
		</div>
	</div>
	<div class="item-details">
		<h3 class="item-title"><?php the_title(); ?></h3>
		<?php if($duties != ''): ?>
		<span class="duties"><?= $duties; ?></span>
		<?php endif; ?>
	</div>
</a>
<?php
	$member_count += 1;
?>
<?php
$product_price = get_post_meta($post->ID, 'product_price', true);
$product_paypal_embed = get_post_meta($post->ID, 'product_paypal_embed', true);
$photo_array = get_post_meta(get_the_ID(), 'product_photo', false);
?>
<a class="item-wrapper col-xs-12 col-sm-6 col-md-4" href="<?php the_permalink(); ?>">
	<div class="item-viewport">
		<div class="flex-holder">
			<ul class="slides">
				<li>
					<?php
					the_post_thumbnail('full', array('class'=>'img-responsive'));
					if($product_price != ''):?>
					<span class="price"><?= $product_price; ?></span>
					<?php endif; ?>
				</li>
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
		<div class="wysiwyg-content">
			<?php the_content(); ?>
			<?= $product_paypal_embed; ?>
		</div>
	</div>
</a>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>HG Skis | <?php echo (is_home()) ? 'Home' : get_the_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="description" content="The East Coast's Premier Ski Company">
	<meta name="keywords" content="hg,hgskis,hg skis,east coast,vermont,burlington,stinger,electronics,sugarbush,park skis,rails">
	<meta name="author" content="Zachary Lincoln">
	<link rel="stylesheet" type="text/css" href="<?= THEME_DIR; ?>/css/styles.css">
	<!--[if lt IE 9]>
	<script type="text/javascript" src="<?= THEME_DIR; ?>/js/html5shiv.js"></script>
	<![endif]-->
	<script type="text/javascript" src="<?= THEME_DIR; ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?= THEME_DIR; ?>/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= THEME_DIR; ?>/js/froogaloop.js"></script>
	<script type="text/javascript" src="<?= THEME_DIR; ?>/js/jquery.fitvid.js"></script>
	<script type="text/javascript" src="<?= THEME_DIR; ?>/js/jquery.flexslider-min.js"></script>
</head>
<body <?= ($current_page = 'home') ? 'class="static-header"' : ''; ?>>
	<header class="clearfix">
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="index.php"></a>
					<a href="#footer-nav" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".collapse-wrapper">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
				</div>
				<div class="collapse-wrapper">
					<ul class="main-nav nav-left">
						<?php
						wp_nav_menu(array(
							'theme_location'=>'main_nav_left',
							'items_wrap' => '%3$s',
							'container'=>false
						));
						?>
					</ul>
					<ul class="main-nav nav-right">
						<?php
						wp_nav_menu(array(
							'theme_location'=>'main_nav_right',
							'items_wrap' => '%3$s',
							'container'=>false
						)); ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
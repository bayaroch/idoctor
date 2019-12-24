	<!doctype html>
	<html <?php language_attributes(); ?> class="no-js">

	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta property="fb:app_id" content="462346254661162" />
        <meta property="fb:admins" content="1014774385275425"/>
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<link rel="manifest" href="site.webmanifest">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="fb-root"></div> 
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=462346254661162&autoLogAppEvents=1"></script>
		<!-- HEADER-->
		<header class="header-main">
			<div class="left-side">
				<a href="/" class="logo-brand"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-dark.svg" alt="logo" /></a>
				<div class="slogan">БАТАЛГААТ ЭХ СУРВАЛЖ</div>
			</div>
			<nav class="main-menu">
				<ul class="menu clearfix">
					<?php header_nav(); ?>
				</ul>
			</nav>
			<div class="tool-menu">
				<ul class="tool-list clearfix">
					<li class="no-border"><a href=""><i class="fab fa-facebook-f"></i></a></li>
					<li class="no-border"><a href=""><i class="fab fa-twitter"></i></a></li>
					<li><button class="search-btn toggle-search"><i class="fas fa-search"></i></button></li>
				</ul>
				<div class="hamburger toggle-button hamburger--squeeze js-hamburger">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>

			</div>

		</header>



		<div class="mobile-menu">
			<div class="inner-mobile">
				<ul class="m-menu clearfix">
				<?php side_nav(); ?>
			    </ul>
			</div>
		</div>

		<div class="search-overlay">
			<a href="#" class="close-search"><i class="fas fa-times"></i></a>
			<form action="#">
				<fieldset>
					<label for="search">Хайлт хийх</label>
					<div class="input-cont">
						<div class="input-bg"><input type="search" class="text" id="search" name="searchozy"></div>
						<button class="submit" type="submit">Хайх</button>
					</div>
				</fieldset>
			</form>
		</div>
<!DOCTYPE html>

<html>
	
	<head>
	<script src="//use.typekit.net/tmg5dfr.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<?php wp_head() ?>
	</head>
	
	<body>

	<!--BEGIN #top-scroller-->
	<a id="top-scroller" href="#"><i class="btb bt-angle-up"></i></a>
	<!--END #top-scroller-->
		
	<div id="zone-standard-upper-header-left">
		<div class="zone-standard-upper-header-left-wrapper">
			
		</div>		
	</div>
	
	<header id="zone-standard-header-left">
		<div id="zone-standard-header-left-wrapper">
			<div id="zone-logo">
				<img src="<?php echo esc_url( get_template_directory_uri() . "/images/logo.png" ) ?>" alt="">
			</div>
			<div id="zone-side-area">
				<i class="btb bt-bars"></i>
			</div>
			<div id="zone-search">
				<i class="btb bt-search"></i>
			</div>
			<div id="zone-mini-cart">
				<i class="btb bt-shopping-cart"></i> $0.00
			</div>			
			<div id="zone-menu">
				<nav>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ) ?>
				</nav>
			</div>
	
		</div>

	</header>
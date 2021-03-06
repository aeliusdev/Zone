<?php global $post, $woocommerce ?>
<!DOCTYPE html>

<html>
	
	<head>
	<script src="//use.typekit.net/tmg5dfr.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	<?php wp_head() ?>
	</head>
	
	<body <?php body_class() ?>>
			
	<!--BEGIN #top-scroller-->
	<a id="top-scroller" href="#"><i class="btb bt-angle-up"></i></a>
	<!--END #top-scroller-->

	<!--BEGIN #side-area-->	
	<aside id="zone-side-area-wrapper">
		<?php dynamic_sidebar( 'side-area' ); ?>
	</aside>
	<!--END #side-area-->
	<a id="zone-side-area-overlay"></a>
			
	<div id="zone-standard-upper-header">
		<div id="zone-standard-upper-header-wrapper">
			<div id="zone-standard-upper-header-right">
				<div id="zone-upper-header-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'upper' ) ) ?>
				</div>
				<div id="zone-upper-header-social-icons">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-behance"></i></a></li>
						<li><a href="#"><i class="fa fa-flickr"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div id="zone-standard-upper-header-left">
				<p>This is completely optional upper header section. Neat!</p>
			</div>
			<div class="clear"></div>
		</div>		
	</div>
	
	<header id="zone-standard-header">
		<div id="zone-standard-header-wrapper">
			<div id="zone-logo">
				<a href="<?php echo esc_url( site_url() ) ?>"><img src="<?php echo esc_url( get_template_directory_uri() . "/images/logo.png" ) ?>" alt=""></a>
			</div>
			<div id="zone-side-area" data-open="false">
				<a href="#"><i class="btb bt-bars"></i></a>
			</div>
			<div id="zone-search">
				<a id="zone-search-toggle" href="#"><i class="btb bt-search"></i></a>
				<div id="zone-search-results" data-open="false">
					<div id="zone-search-results-arrow-up"></div>
					<form id="search" method="get">
						<input name="s" type="text" value="">
					</form>
				</div>
			</div>
			<?php if( true == ZoneWooCommerce::is_active() ) : ?>
			<div id="zone-mini-cart">
				<a class="zone-mini-cart-link" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ) ?>"><i class="btb bt-shopping-cart"></i> <?php echo WC()->cart->get_cart_subtotal(); ?></a>
				<div id="woocommerce-mini-cart">
				<div id="zone-mini-cart-arrow-wrap">				
					<div id="zone-mini-cart-arrow-up"></div>
				</div>
				<?php get_template_part( 'includes/section', 'mini-cart' ) ?>
				</div>
			</div>
			<?php endif ?>			
			<div id="zone-menu">
				<nav>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new zone_walker_menu() ) ) ?>
				</nav>
			</div>
			<div class="clear"></div>
		</div>
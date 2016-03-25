	<footer>
		<div id="zone-footer-wrapper">
			<div class="zone-column-4 first"><?php dynamic_sidebar( 'footer_widget_1' ); ?></div>
			<div class="zone-column-4"><?php dynamic_sidebar( 'footer_widget_2' ); ?></div>
			<div class="zone-column-4"><?php dynamic_sidebar( 'footer_widget_3' ); ?></div>
			<div class="zone-column-4"><?php dynamic_sidebar( 'footer_widget_4' ); ?></div>
			<div class="clear"></div>
		</div>
	</footer>
	
	<div id="zone-lower-footer">
		<div id="zone-lower-footer-social-icons">
			<ul>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-behance"></i></a></li>
				<li><a href="#"><i class="fa fa-flickr"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
		<div id="zone-lower-footer-menu">
			<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ) ?>
		</div>
		<p>&copy; Village WordPress Theme. Made by <a href="#">ThemeProvince</a></p>
	</div>

	<?php wp_footer() ?>
	</body>

</html>
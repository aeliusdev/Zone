<?php 
	
get_header(); 

$builder_status = get_post_meta( $post->ID, 'zone_builder_status', true );
$builder_data = get_post_meta( $post->ID, 'zone_builder_data', true );
$zone_header = get_post_meta( $post->ID, 'zone-layout-header', true ) == "default" ? "show_header" : get_post_meta( $post->ID, 'zone-layout-header', true );
	
if( $zone_header == "show_header" ) :	
?>

		<div id="zone-page-titles" class="zone-page-section">
			<?php the_title( '<h1 id="zone-page-title">', '</h1>' ) ?>
			<?php zone_breadcrumbs() ?>
		</div>

<?php endif ?>
		
	</header>
<main>
<?php
if( have_posts() ) : while( have_posts() ) : the_post(); 

if( $builder_status == "builder" )
{
	echo apply_filters( 'the_content', $builder_data );
} else 
{
	?>
<div class="zone-page-section">	
	<?php the_content() ?>
</div>
	<?php
}

endwhile; endif; 
?>
</main>
<?php

get_footer() 

?>
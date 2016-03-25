<div class="zone-standard-post" <?php post_class() ?>>
	<a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
	<div class="zone-post-thumb">
		<?php
		$image_id = get_post_thumbnail_id();  
		$image_url = wp_get_attachment_image_src($image_id, 'full');
		$image_url_thumb = wp_get_attachment_image_src($image_id, 'blog-thumb');
		?>
		<a href="<?php the_permalink() ?>">
			<img src="<?php echo esc_url( $image_url_thumb[0] ) ?>" alt="">
		</a>
	</div>
	<div class="zone-post-meta">
		<p>Posted by <?php the_author_posts_link() ?> on <a href="<?php the_permalink() ?>"><?php echo the_date( 'F j, Y' ) ?></a>. Tags: <?php if( has_tag() ) { the_tags( 'Tags: ', ', ', '' ); } else { echo esc_html( 'None' ); } ?></p>
	</div>
	<div class="zone-post-content">
		<?php the_content() ?>
	</div>
</div>
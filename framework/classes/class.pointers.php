<?php 
	
add_action( 'admin_enqueue_scripts', 'custom_admin_pointers_header' );

function custom_admin_pointers_header() 
{
   if ( custom_admin_pointers_check() ) 
   {
      add_action( 'admin_print_footer_scripts', 'custom_admin_pointers_footer' );

      wp_enqueue_script( 'wp-pointer' );
      wp_enqueue_style( 'wp-pointer' );
   }
}

function custom_admin_pointers_check() 
{
   $admin_pointers = custom_admin_pointers();
   foreach ( $admin_pointers as $pointer => $array ) 
   {
      if ( $array['active'] )
         return true;
   }
}

function custom_admin_pointers_footer() 
{
   $admin_pointers = custom_admin_pointers();
   ?>
<script type="text/javascript">
/* <![CDATA[ */
( function($) {
   <?php
   foreach ( $admin_pointers as $pointer => $array ) {
      if ( $array['active'] ) {
         ?>
         $( '<?php echo $array['anchor_id']; ?>' ).pointer( {
            content: '<?php echo $array['content']; ?>',
            position: {
            edge: '<?php echo $array['edge']; ?>',
            align: '<?php echo $array['align']; ?>'
         },
            close: function() {
               $.post( ajaxurl, {
                  pointer: '<?php echo $pointer; ?>',
                  action: 'dismiss-wp-pointer'
               } );
            }
         } ).pointer( 'open' );
         <?php
      }
   }
   ?>
} )(jQuery);
/* ]]> */
</script>
   <?php
}

function custom_admin_pointers() 
{
	
	global $themep_pointers;
	
	$dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
	$version = '1_0'; // replace all periods in 1.0 with an underscore
	$prefix = 'custom_admin_pointers' . $version . '_';
	  
	return $themep_pointers;
   
}

?>
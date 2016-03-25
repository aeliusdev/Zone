<?php 

/**
 * 10. Custom Walker Menu Class
 */
 
class zone_walker_menu extends Walker_Nav_Menu 
{
    
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
	{
	    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	    $classes[] = 'menu-item-' . $item->ID;
	    
	    $hot_class = 'menu-hot';
	    $new_class = 'menu-new';
	    $featured_class = 'menu-featured';
	    $image_class = 'menu-image';
	    $sale_class = 'menu-sale';
	    
	    $classes_array = array_flip( $classes );	    
	    /**
	     * Filter the CSS class(es) applied to a menu item's list item element.
	     *
	     * @since 3.0.0
	     * @since 4.1.0 The `$depth` parameter was added.
	     *
	     * @param array  $classes The CSS classes that are applied to the menu item's `<li>` element.
	     * @param object $item    The current menu item.
	     * @param array  $args    An array of {@see wp_nav_menu()} arguments.
	     * @param int    $depth   Depth of menu item. Used for padding.
	     */
	    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	    /**
	     * Filter the ID applied to a menu item's list item element.
	     *
	     * @since 3.0.1
	     * @since 4.1.0 The `$depth` parameter was added.
	     *
	     * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
	     * @param object $item    The current menu item.
	     * @param array  $args    An array of {@see wp_nav_menu()} arguments.
	     * @param int    $depth   Depth of menu item. Used for padding.
	     */
	    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
	    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	    $output .= $indent . '<li' . $id . $class_names .'>';
	    $atts = array();
	    $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
	    $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
	    $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
	    $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	    /**
	     * Filter the HTML attributes applied to a menu item's anchor element.
	     *
	     * @since 3.6.0
	     * @since 4.1.0 The `$depth` parameter was added.
	     *
	     * @param array $atts {
	     *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
	     *
	     *     @type string $title  Title attribute.
	     *     @type string $target Target attribute.
	     *     @type string $rel    The rel attribute.
	     *     @type string $href   The href attribute.
	     * }
	     * @param object $item  The current menu item.
	     * @param array  $args  An array of {@see wp_nav_menu()} arguments.
	     * @param int    $depth Depth of menu item. Used for padding.
	     */
	    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
	    $attributes = '';
	    foreach ( $atts as $attr => $value ) {
	            if ( ! empty( $value ) ) {
	                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
	                    $attributes .= ' ' . $attr . '="' . $value . '"';
	            }
	    }
	    $item_output = $args->before;
	    $item_output .= '<a' . $attributes;
	    $item_output .= '>';
	    /** This filter is documented in wp-includes/post-template.php */
	    $item_output .= ( isset( $classes_array[ "menu-item-has-children" ] ) && $depth > 0 ) ? '' : "";
	    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	    $item_output .= ( isset( $classes_array[ "menu-item-has-children" ] ) && $depth == 0 ) ? '&nbsp; <i class="fa fa-angle-down"></i> ' : "";
	    $item_output .= ( isset( $classes_array[ $hot_class ] ) ) ? ' <span class="menu-item-hot">Hot</span>' : "";
	    $item_output .= ( isset( $classes_array[ $new_class ] ) ) ? ' <span class="menu-item-new">New</span>' : "";
	    $item_output .= ( isset( $classes_array[ $featured_class ] ) ) ? ' <span class="menu-item-featured">Featured</span>' : "";
	    $item_output .= ( isset( $classes_array[ $image_class ] ) ) ? ' <span class="menu-item-image">Image</span>' : "";
	    $item_output .= ( isset( $classes_array[ $sale_class ] ) ) ? ' <span class="menu-item-sale">Sale</span>' : "";
	    $item_output .= '</a>';
	    $item_output .= $args->after;
	    /**
	     * Filter a menu item's starting output.
	     *
	     * The menu item's starting output only includes `$args->before`, the opening `<a>`,
	     * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
	     * no filter for modifying the opening and closing `<li>` for a menu item.
	     *
	     * @since 3.0.0
	     *
	     * @param string $item_output The menu item's starting HTML output.
	     * @param object $item        Menu item data object.
	     * @param int    $depth       Depth of menu item. Used for padding.
	     * @param array  $args        An array of {@see wp_nav_menu()} arguments.
	     */
	    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
			
}	
	
?>
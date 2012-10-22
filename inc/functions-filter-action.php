<?php
/*
@package WordPress
@subpackage Basics
@author Bruno Bichet <bruno.bichet@gmail.com>
@version 0.5
@since Version 0.2.7
For Those About to Rock. Fire!
*/

/*
TOC:
1. remove_filter()					Remove <p> in category or tag description
2. basics_page_menu_args()			Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
3. basics_excerpt_length()			Sets the post excerpt length to 52 characters.
4. basics_continue_reading_link()	Returns a "Continue Reading" link for excerpts
5. basics_auto_excerpt_more()		Replaces "[...]" with an ellipsis and basics_continue_reading_link().
6. basics_custom_excerpt_more()		Adds a pretty "Continue Reading" link to custom post excerpts.
7. basics_widgets_init()			Register widgetized area and update sidebar with default widgets
8. basics_body_class()				Add custom body classes
9. basics_img_caption_shortcode()	The Caption shortcode with figure and figcaption.
10. basics_change_mce_options()		Add support for iframe element in wysiwyg editor
11. basics_jquery()					Load jQuery in footer
12. basics_scripts()				Load other Javascripts in footer
13. posts_link_rel_next()			Print rel "next" microformats attributes on navivagation links between posts
14. posts_link_rel_prev()			Print rel "prev" microformats attributes on navivagation links between posts
15. remove_more_jump_link()			Remove link Jumps to the More tag or Top of Page
16. basics_search_autofocus()		Print autofocus attribute to search form when is_search() 
17. basics_searchform()				Display Search Form
*/

/**
 * 1. Disable the wpautop function so that WordPress makes no attempt to correct your markup.
 * http://nicolasgallagher.com/using-html5-elements-in-wordpress-post-content/
 */
//remove_filter('the_excerpt', 'wpautop');
//remove_filter('the_content', 'wpautop');

/* Remove <p> in category or tag description */
remove_filter('term_description','wpautop');
 
/**
 * 2. Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
add_filter( 'wp_page_menu_args', 'basics_page_menu_args' );
if ( ! function_exists( 'basics_page_menu_args' ) ) :
function basics_page_menu_args($args) {
	$args['show_home'] = true;
	return $args;
}
endif;
	
/**
 * 3. Sets the post excerpt length to 52 characters.
 */
add_filter( 'excerpt_length', 'basics_excerpt_length' );
if ( ! function_exists( 'basics_excerpt_length' ) ) :
function basics_excerpt_length( $length ) {
	return 52;
}
endif;

/**
 * 4. Returns a "Continue Reading" link for excerpts
 */
if ( ! function_exists( 'basics_continue_reading_link' ) ) :
function basics_continue_reading_link() {
	return ' <a href="'. get_permalink() . '" rel="nofollow">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'basics' ) . '</a>';
}
endif;

/**
 * 5. Replaces "[...]" (appended to automatically generated excerpts) 
 * with an ellipsis and basics_continue_reading_link().
 */
add_filter( 'excerpt_more', 'basics_auto_excerpt_more' );
if ( ! function_exists( 'basics_auto_excerpt_more' ) ) :
function basics_auto_excerpt_more( $more ) {
	return ' &hellip;' . basics_continue_reading_link();
}
endif;

/**
 * 6. Adds a pretty "Continue Reading" link to custom post excerpts.
 */
add_filter( 'get_the_excerpt', 'basics_custom_excerpt_more' );
if ( ! function_exists( 'basics_custom_excerpt_more' ) ) :
function basics_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= basics_continue_reading_link();
	}
	return $output;
}
endif;

/**
 * 7. Register widgetized area and update sidebar with default widgets
 */
add_action( 'widgets_init', 'basics_widgets_init' );
if ( ! function_exists( 'basics_widgets_init' ) ) :
function basics_widgets_init() {
	register_sidebar( array (
		'name' => __( 'One', 'basics' ),
		'id' => 'war-1',
		'description' => __( 'Widgets Area One', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Two', 'basics' ),
		'id' => 'war-2',
		'description' => __( 'Widgets Area Two', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Three', 'basics' ),
		'id' => 'war-3',
		'description' => __( 'Widgets Area Three', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Four', 'basics' ),
		'id' => 'war-4',
		'description' => __( 'Widgets Area Four', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Five', 'basics' ),
		'id' => 'war-5',
		'description' => __( 'Widgets Area Five', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Six', 'basics' ),
		'id' => 'war-6',
		'description' => __( 'Widgets Area Six', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Seven', 'basics' ),
		'id' => 'war-7',
		'description' => __( 'Widgets Area Seven', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Eight', 'basics' ),
		'id' => 'war-8',
		'description' => __( 'Widgets Area Eight', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Nine', 'basics' ),
		'id' => 'war-9',
		'description' => __( 'Widgets Area Nine', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Ten', 'basics' ),
		'id' => 'war-10',
		'description' => __( 'Widgets Area Ten', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array (
		'name' => __( 'Eleven', 'basics' ),
		'id' => 'war-11',
		'description' => __( 'Widgets Area Eleven', 'basics' ),
		'before_widget' => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}
endif;

/**
 * 8. Add custom body classes
 */
add_filter( 'body_class', 'basics_body_class' );
if ( ! function_exists( 'basics_body_class' ) ) :
function basics_body_class($classes) {
	if ( is_singular() )
		$classes[] = 'singular';
	return $classes;
}
endif;

/**
 * 9. The Caption shortcode with figure and figcaption
 * fix based on http://wordpress.org/support/topic/caption-broken-in-new-34-posts
 * Thanks @regisrob
 */
add_filter( 'img_caption_shortcode', 'basics_caption_shortcode_filter',10,3 );
if ( ! function_exists( 'basics_caption_shortcode_filter' ) ) :
function basics_caption_shortcode_filter( $val, $attr, $content = null ) {
	extract(shortcode_atts(
		array(
		'id' => '',
		'align' => '',
		'width' => '',
		'caption' => ''
		), 
		$attr )
	);
	if ( 1 > ( int ) $width || empty( $caption ) )
	    return $val;
	$capid = '';
	if ( $id ) {
	    $id = esc_attr( $id );
	    $capid = 'id="figcaption_'. $id . '" ';
	    $id = 'id="' . $id . '" aria-labelledby="figcaption_' . $id . '" ';
	}
	return '<figure ' . $id . 'class="wp-caption ' . esc_attr( $align ) . '" style="width: '
	. (0 + ( int ) $width) . 'px">' . do_shortcode( $content ) . '<figcaption ' . $capid
	. 'class="wp-caption-text">' . $caption . '</figcaption></figure>';
}
endif;

/**
 * 10. Add support for iframe element in wysiwyg editor 
 * http://wpengineer.com/1963/customize-wordpress-wysiwyg-editor/
 */
add_filter('tiny_mce_before_init', 'basics_change_mce_options');
if ( ! function_exists( 'basics_change_mce_options' ) ) :
function basics_change_mce_options( $initArray ) {
	// Comma separated string od extendes tags
	// Command separated string of extended elements
	$ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src]';
	if ( isset( $initArray['extended_valid_elements'] ) ) {
		$initArray['extended_valid_elements'] .= ',' . $ext;
	} else {
		$initArray['extended_valid_elements'] = $ext;
	}
	// maybe; set tiny paramter verify_html
	//$initArray['verify_html'] = false;
	return $initArray;
}
endif;

/**
 * 11. Load jQuery in footer
 */
add_action('wp_enqueue_scripts', 'basics_jquery');
if ( ! function_exists( 'basics_jquery' ) ):	
function basics_jquery() {
	/* Grab jQuery from Basics */
	$path_to_jquery = get_template_directory_uri() . '/js/vendor/jquery.js';
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', $path_to_jquery);
	wp_enqueue_script('jquery', $path_to_jquery, false, false, true);
}    
endif;

/**
 * 12. Load other Javascripts in footer
 */
add_action('wp_footer', 'basics_scripts');
if ( ! function_exists( 'basics_scripts' ) ):	
function basics_scripts() {
/*
Note: 
Grab the scripts from Basics. 
See functions.php file in Beyond Basics to load scripts from the Child theme 
*/
?>
<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
<?php
}
endif;

/**
 * 13. Print rel "next" microformats attributes on navivagation links between posts.
 */ 
add_filter('next_posts_link_attributes', 'posts_link_rel_next');
if ( ! function_exists( 'posts_link_rel_next' ) ) :
function posts_link_rel_next(){
	return 'rel="next"';
}
endif;

/**
 * 14. Print rel "prev" microformats attributes on navivagation links between posts.
 */ 
add_filter('previous_posts_link_attributes', 'posts_link_rel_prev');
if ( ! function_exists( 'posts_link_rel_prev' ) ) :
function posts_link_rel_prev(){
	return 'rel="prev"';
}
endif;

/**
 * 15. Remove link Jumps to the More tag or Top of Page
 */ 
add_filter('the_content_more_link', 'remove_more_jump_link');
if ( ! function_exists( 'remove_more_jump_link' ) ) :
function remove_more_jump_link( $link ) { 
	$offset = strpos( $link, '#more-' );
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
endif;

/**
 * 16. Print autofocus attribute to search form when is_search()
 * Kudos @jubianchi [http://www.jubianchi.fr]
 */
if ( ! function_exists( 'basics_search_autofocus' ) ):	
function basics_search_autofocus() {
	global $wp_query;
	if ( is_search() ) {
		return 'autofocus';
	}
} 
endif;

/**
 * 17. Display Search Form
 * Kudos @jubianchi [http://www.jubianchi.fr]
 */
add_filter( 'get_search_form', 'basics_searchform' );
if ( ! function_exists( 'basics_searchform' ) ):	
function basics_searchform() {
	$title = __( 'Search', 'basics' );
	$action = home_url( '/' );
	$label = __( 'Search in ','basics' ) . ' ' . get_bloginfo( 'name' );;
	$query = get_search_query();
	$placeholder = __( 'Search in (hit Enter)','basics' );
	$autofocus = basics_search_autofocus(); 
	$submit = __( 'Search in','basics' );

	return <<<HTML
<section class="search-in">
	<h1 class="section-title">$title</h1>
	<form action="$action" method="get" role="search">
		<fieldset>
			<label for="search">$label</label>
			<input type="search" name="s" id="search" value="$query" $autofocus placeholder="$placeholder" />
			<input type="submit" value="$submit" />
		</fieldset>
	</form>
</section>
HTML;
}    
endif;
?>
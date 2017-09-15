<?php
add_action( 'after_setup_theme', 'generic_setup' );
function generic_setup()
{
load_theme_textdomain( 'generic', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => esc_html__( 'Main Menu', 'generic' ) )
);
}
add_action( 'wp_enqueue_scripts', 'generic_load_scripts' );
function generic_load_scripts()
{
wp_enqueue_style( 'generic-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
wp_register_script( 'generic-videos', get_template_directory_uri() . '/js/videos.js' );
wp_enqueue_script( 'generic-videos' );
wp_add_inline_script( 'generic-videos', 'jQuery(document).ready(function($){$("#wrapper").vids();});' );
}
add_filter( 'document_title_separator', 'generic_document_title_separator' );
function generic_document_title_separator( $sep ) {
$sep = "|";
return $sep;
}
add_filter( 'the_title', 'generic_title' );
function generic_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
function generic_read_more_link() {
if ( ! is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">...</a>';
}
}
add_filter( 'the_content_more_link', 'generic_read_more_link' );
function generic_excerpt_read_more_link( $more ) {
if ( ! is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">...</a>';
}
}
add_filter( 'excerpt_more', 'generic_excerpt_read_more_link' );
add_action( 'widgets_init', 'generic_widgets_init' );
function generic_widgets_init()
{
register_sidebar( array (
'name' => esc_html__( 'Sidebar Widget Area', 'generic' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'comment_form_before', 'generic_enqueue_comment_reply_script' );
function generic_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
function generic_custom_pings( $comment )
{
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'generic_comment_count', 0 );
function generic_comment_count( $count ) {
if ( ! is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
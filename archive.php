<?php get_header(); ?>
<main id="content">
<header class="header">
<h1 class="entry-title"><?php 
if ( is_day() ) { printf( esc_html__( 'Daily Archives: %s', 'generic' ), esc_attr( get_the_time( get_option( 'date_format' ) ) ) ); }
elseif ( is_month() ) { printf( esc_html__( 'Monthly Archives: %s', 'generic' ), esc_attr( get_the_time( 'F Y' ) ) ); }
elseif ( is_year() ) { printf( esc_html__( 'Yearly Archives: %s', 'generic' ), esc_attr( get_the_time( 'Y' ) ) ); }
else { esc_html_e( 'Archives', 'generic' ); }
?></h1>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
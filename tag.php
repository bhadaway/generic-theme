<?php get_header(); ?>
<main id="content">
<header class="header">
<h1 class="entry-title"><?php esc_html_e( 'Tag Archives: ', 'generic' ); ?><?php the_archive_title(); ?></h1>
</header>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
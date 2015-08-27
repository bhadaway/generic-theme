<?php get_header(); ?>
<main id="content">
<article id="post-0" class="post not-found">
<header class="header">
<h1 class="entry-title"><?php _e( 'Not Found', 'generic' ); ?></h1>
</header>
<div class="entry-content">
<p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'generic' ); ?></p>
<?php get_search_form(); ?>
</div>
</article>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
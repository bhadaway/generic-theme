<footer class="entry-footer">
<span class="cat-links"><?php _e( 'Categories: ', 'generic' ); ?><?php the_category( ', ' ); ?></span>
<span class="tag-links"><?php the_tags(); ?></span>
<?php if ( comments_open() ) { 
echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'generic' ) ) . '</a></span>';
} ?>
</footer> 
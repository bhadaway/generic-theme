<div class="entry-meta">
<span class="author vcard" itemprop="author"><?php the_author_posts_link(); ?></span>
<span class="meta-sep"> | </span>
<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" itemprop="datePublished" pubdate><?php the_time( get_option( 'date_format' ) ); ?></time>
</div>
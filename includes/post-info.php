<span class="post-info-item post-info-item-first"><i class="icon-calendar"></i>&nbsp;<?php echo get_the_date('d. m. Y'); ?></span>
<span class="post-info-item"><i class="icon-user"></i>&nbsp;<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );; ?>"><?php echo get_the_author(); ?></a></span>
<span class="post-info-item"><i class="icon-comments"></i>&nbsp;<a href="<?php the_permalink(); ?>#disqus_thread" data-disqus-identifier="<?php the_permalink(); ?>">Komentáře</a></span>
<?php $categories_list = get_the_category_list( __( ', ' ) ); if ( $categories_list ): ?>
<span class="post-info-item"><i class="icon-book"></i>&nbsp;<?php echo $categories_list; ?></span>
<?php endif; ?>
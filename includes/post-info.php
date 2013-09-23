<span class="post-info-item post-info-item-first"><i class="icon-calendar"></i>&nbsp;<?php echo get_the_date('d. m. Y'); ?></span>
<span class="post-info-item"><i class="icon-user"></i>&nbsp;<a href="<?php echo get_author_posts_url(); ?>"><?php echo get_the_author(); ?></a></span>
<span class="post-info-item"><i class="icon-comments"></i>&nbsp;<a href="<?php the_permalink(); ?>#disqus_thread">Komentáře</a></span>
<?php $categories_list = get_the_category_list( __( ', ' ) ); if ( $categories_list ): ?>
<span class="post-info-item"><i class="icon-list"></i>&nbsp;<?php echo $categories_list; ?></span>
<?php endif; ?>
<!--
<?php $tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) ); if ( $tag_list ): ?>
<span class="post-info-item"><i class="icon-tag"></i>&nbsp;<?php echo $tag_list; ?></span>
<?php endif; ?>
-->



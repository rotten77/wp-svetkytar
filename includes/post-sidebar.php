	<div class="media">
		<?php if(get_post_thumbnail_id()): ?>
		<a class="pull-left" href="<?php the_permalink(); ?>">
			<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 64, 64); ?>" class="media-object" alt="<?php the_title(); ?>" />
		</a>
		<?php endif; ?>
		<div class="media-body">
			<h5 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			<p><span class="post-info"><span class="post-info-item post-info-item-first"><i class="icon-calendar"></i>&nbsp;<?php echo get_the_date('d. m. Y'); ?></span></span><small><?php echo short_text(get_the_excerpt(), 100); ?></small></p>
		</div>
							
	</div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
		<?php while(have_posts()) : the_post(); ?>
			<div class="media">
				<a class="pull-left" href="<?php the_permalink(); ?>">
					<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 64, 64); ?>" class="media-object" alt="<?php the_title(); ?>" />
				</a>
				<div class="media-body">
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p>
						<?php echo get_the_author(); ?>
					</p>

					<div class="post-meta">
						<span class="date"><?php the_time('F j, Y'); ?></span> 
						<span class="sep"> - </span>						
						<span class="category"><?php the_category(', '); ?></span>
						<?php the_tags( '<span class="sep"> - </span><span class="tags">' . __('Tagged: ', 'max-magazine' ) . ' ', ", ", "</span>" ) ?>
						<?php if ( comments_open() ) : ?>
							<span class="sep"> - </span>
							<span class="comments"><?php comments_popup_link( __('no comments', 'max-magazine'), __( '1 comment', 'max-magazine'), __('% comments', 'max-magazine')); ?></span>			
						<?php endif; ?>		
					</div>	
				</div>
					
			</div>
		<?php endwhile;?>


<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

		</div>
		
		<div class="col-md-4">
		<?php get_sidebar(); ?>	
		</div>
	</div>
</div>
<div class="container">
		<!-- vybrané příspěvky -->
	<div class="row">
	<div class="col-md-8">
	<h2>Vybrané</h2>
	<?php query_posts('meta_key=sk_vybrane&meta_value=1&posts_per_page=5&paged=1'); ?>
	<?php if(have_posts()): ?>
	<div id="carousel-example-generic" class="carousel slide">

	<?php $carousel = $wp_query->post_count; ?>
		<ol class="carousel-indicators">
			<?php for($i=0;$i<$carousel;$i++) { ?>
			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"<?php if($i==0) echo ' class="active"'; ?>></li>
			<?php } ?>
		</ol>
	
		<div class="carousel-inner">
			<?php
			$first = true;
			while(have_posts()) : the_post(); ?>
			
				<?php $excludePosts[] = $post->ID; ?>
			
				<div class="item<?php if($first) echo ' active'; ?>">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>" /></a>
					<div class="carousel-caption">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php the_excerpt(); ?></p>
					</div>
				</div>
			
			<?php
			$first = false;
			endwhile;?>
		</div>

		<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><span class="icon-prev"></span></a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="icon-next"></span></a>
	</div>
	<?php endif; ?>


	</div>
	<!--								/*get_permalink(),
									get_the_date( 'c' ),
									get_the_date(),
									get_author_posts_url( get_the_author_meta( 'ID' ) ),
									sprintf( esc_attr__( 'View all posts by %s', 'themename' ), get_the_author() ),
		-->							
	
	<div class="col-md-4">
		<h2>Nejnovější</h2>
		<?php query_posts('posts_per_page=5'); ?>
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
				</div>
					
			</div>
		<?php endwhile;?>
	</div>
	</div>
	
	<div class="row">
		<?php // query_posts(array('post__not_in' => $excludePosts)); ?>
		<?php while(have_posts()) : the_post(); ?>
			<div class="col-md-2">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 240, 120); ?>" class="img-responsive" alt="<?php the_title(); ?>" /></a>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
			</div>
		<?php endwhile;?>
	</div>
</div>
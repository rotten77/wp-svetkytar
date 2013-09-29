<div class="container">

	<?php query_posts('meta_key=sk_vybrane&meta_value=1&posts_per_page=5&paged=1'); ?>
	<?php if(have_posts()): ?>


	<?php
		$i=0;
		// $carousel = $wp_query->post_count;
	?>

<div class="row">
	<?php
	while(have_posts()) : the_post();
	$i++;
	?>
	
		<?php if($i==1): ?>
		
			<div class="col-md-8">
				<div class="post-box">
					
					<div class="post-box-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 760, 435); ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a></div>
					<div class="post-box-content">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php
						$perex = get_the_excerpt();
						// $perex = short_text($perex);
						echo $perex;
						?></p>
						<p class="post-info"><?php get_template_part('includes/post-info'); ?></p>
					</div>
				</div>
			</div>
		
		<?php endif; ?>


		<?php if($i==2): ?>
		
			<div class="col-md-4">
				<div class="post-box post-box-second">
					
					<div class="post-box-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a></div>
					<div class="post-box-content">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<!--<p><?php
						$perex = get_the_excerpt();
						echo short_text($perex, 120);
						?></p>
						<p><small><?php echo get_the_date('d. m. Y').", autor: <strong>".get_the_author()."</strong>, kategorie: "; the_category(', ');?></small></p>
						-->
					</div>
				</div>
		
		<?php endif; ?>

		<?php if($i==3): ?>
			
				<div class="post-box">
					
					<div class="post-box-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a></div>
					<div class="post-box-content">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<!--<p><?php
						$perex = get_the_excerpt();
						echo short_text($perex, 120);
						?></p>
						<p><small><?php echo get_the_date('d. m. Y').", autor: <strong>".get_the_author()."</strong>, kategorie: "; the_category(', ');?></small></p>
						-->
					</div>
				</div>
			</div>
		
		<?php endif; ?>
			
	<?php endwhile;?>

	<?php endif; ?>

</div>

<div class="row">
	<div class="col-md-12 text-center">
		<?php echo file_get_contents(dirname(__FILE__) . "./../reklamy/index.html"); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="icon-sort-by-attributes-alt"></i> Nejnovější články</h3>
			</div>
			
			<div class="panel-body">
				<?php query_posts(array('posts_per_page' => 4, 'category__not_in' => array(3,9))); ?>
				<?php while(have_posts()) : the_post();
				 ?>
					<div class="media">
						<?php if(get_post_thumbnail_id()): ?>
						<a class="pull-left" href="<?php the_permalink(); ?>">
							<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 64, 64); ?>" class="media-object" alt="<?php the_title(); ?>" />
						</a>
						<?php endif; ?>
						<div class="media-body">
							<h5 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<p><?php echo short_text(get_the_excerpt()); ?></p>
							<p class="post-info"><?php get_template_part('includes/post-info'); ?></p>
						</div>
							
					</div>
				<?php endwhile;?>
				
			</div>
			
			<div class="panel-footer">
				<a href="<?php echo LINK_BASE; ?>clanky" class="btn btn-primary"><i class="icon-arrow-right"></i> Další články</a>
			</div>
		</div>
	</div>
	
	<div class="col-md-6">
			<?php get_template_part('includes/social-links'); ?>

		<div class="panel panel-danger row-topm">
			<div class="panel-heading"><h3 class="panel-title"><i class="icon-play-circle"></i> Videa</h3></div>
			<div class="panel-body">

				<div class="row">
					<?php query_posts(array('posts_per_page' => 4, 'category__in' => 9)); ?>
					<?php
						$i=0;
						while(have_posts()) : the_post(); ?>

						<?php
							if($i==2) {
								echo '</div><div class="row row-topm">';
							}

						 ?>
						 
						<div class="col-md-6">
							<div class="post-box">
								<?php if(get_post_thumbnail_id()): ?>
								<div class="post-box-image"><a href="<?php the_permalink(); ?>"><img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 375, 275); ?>" alt="<?php the_title(); ?>" class="img-responsive" /></a></div>
								<?php endif; ?>
								<div class="post-box-content">
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								</div>
							</div>
						</div>

						<?php
							if($i==2) $i=0;
							$i++;
						?>
					
					<?php endwhile;?>
				</div>
				
			</div>
			<div class="panel-footer">
				<a href="<?php echo LINK_BASE; ?>category/video" class="btn btn-danger"><i class="icon-arrow-right"></i> Další videa</a>
			</div>
		</div>

		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="icon-time"></i> Bleskovky</h3>
			</div>
			
			<div class="panel-body">
				<?php query_posts(array('posts_per_page' => 4, 'category__in' => 3)); ?>
				<?php while(have_posts()) : the_post(); ?>
					<div class="media">
						<?php if(get_post_thumbnail_id()): ?>
						<a class="pull-left" href="<?php the_permalink(); ?>">
							<img src="<?php echo sk_thumb(get_post_thumbnail_id($post->ID), 32, 32); ?>" class="media-object" alt="<?php the_title(); ?>" />
						</a>
						<?php endif; ?>
						<div class="media-body">
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<!--<p><?php echo short_text(get_the_excerpt()); ?></p>
							<p><small><?php echo get_the_date('d. m. Y').", autor: <strong>".get_the_author()."</strong>, kategorie: "; the_category(', ');?></small></p>
							-->
						</div>
							
					</div>
				<?php endwhile;?>
				
			</div>
			
			<div class="panel-footer">
				<a href="<?php echo LINK_BASE; ?>category/bleskovky" class="btn btn-warning"><i class="icon-arrow-right"></i> Další bleskovky</a>
			</div>
		</div>
	</div>
</div>
</div>